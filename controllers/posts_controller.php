<?php
  /**
   INOROUT - Social Discussion Platform.
   Copyright (C) 2010 Shawn Tan <shawn.tan@sybreon.com>
 
   This program is free software: you can redistribute it and/or
   modify it under the terms of the GNU Affero General Public License
   as published by the Free Software Foundation, either version 3 of
   the License, or (at your option) any later version.
 
   This program is distributed in the hope that it will be useful, but
   WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
   Affero General Public License for more details.
   
   You should have received a copy of the GNU Affero General Public
   License along with this program.  If not, see
   <http://www.gnu.org/licenses/>.
  */

App::import('Core', 'HttpSocket');
App::import('Sanitize');
App::import('Vendor','bitly'); // Import LightOpenID library

class PostsController extends AppController {

  var $name = 'Posts';
  var $helpers = array ('Form','Html','Text','Ajax','Javascript','Time','Paginator');
  var $components = array('RequestHandler');

  var $paginate = array();
  
  private function bitly_shorten($url = null) {
    $bitly = new Bitly('inorout','R_2342b6909d934450e77e4cf712a5a7f9');
    return $bitly->shorten($url);
  }
  
  private function bitly_expand($url = null) {
    $bitly = new Bitly('inorout','R_2342b6909d934450e77e4cf712a5a7f9');
    return $bitly->expand($url);
  }

  private function bitly_info($url = null) {
    $bitly = new Bitly('inorout','R_2342b6909d934450e77e4cf712a5a7f9');
    return $bitly->info($url);
    return array('info' => $bitly->getData());
  }
  
  /**
   Default - lists all posts
  */
  
  function index() {
    $this->paginate = array('limit' => 10,
			    'order' => array('Post.id' => 'desc'),
			    'conditions' => array('Post.vins >= Post.vouts', 'Post.flags >= 0'));
    $posts_in = $this->paginate('Post');
    $this->set('posts_in', $posts_in);

    $this->paginate = array('limit' => 10,
			    'order' => array('Post.id' => 'desc'),
			    'conditions' => array('Post.vins <= Post.vouts', 'Post.flags >= 0'));
    $posts_out = $this->paginate('Post');
    $this->set('posts_out', $posts_out);

    $this->pageTitle = 'IN/OUT - Read. Think. Vote';
  }
  
  /**
   Retrieves and displays a single post.
  */
  
  function view($id = null) {    
    // Increment counter once in a session
    if (!$this->Session->check('Post.'.$id)) {
      $this->Post->updateAll(array('Post.views' => 'Post.views+1'), array('Post.id' => $id));
      $this->Session->write('Post.'.$id,'');
    }
    
    // Extract the post
    $post = $this->Post->find(array('Post.id' => $id));
    //$post['url'] = base64_encode($post['Post']['url']);
    if ($post['Post']['url'] != null) {
      $post['bitly'] = $this->bitly_info($post['Post']['url']);
    }

    if ($this->Session->check('User.id')) {
      // Extract votes
      $this->loadModel('Vote');
      $this->set('vote', 
		 $this->Vote->find(array('Vote.post_id' => $id,
					 'Vote.user_id' => $this->Session->read('User.id'))));

      $this->loadModel('Flag');
      $this->set('flag', 
		 $this->Flag->find(array('Flag.post_id' => $id,
					 'Flag.user_id' => $this->Session->read('User.id'))));
     
    }

    $this->set('post',$post);
    $this->pageTitle = $post['Post']['title'];
    
    // Extract comments
    $this->loadModel('Comment');
    $this->set('comments', 
	       $this->Comment->find('threaded', 
				    array('conditions' => array('Comment.post_id' => $id))));	  
    
  }

  /**
   Edit an existing post.
  */
  
  function edit($id = null) {
    assert('is_numeric($id)'); // check input
    $this->pageTitle = 'Edit Post #'.$id;

    if (!$this->Session->check('User.id')) {
      $this->Session->write('Session.referer', array('controller' => 'posts','action' => 'add'));
      $this->redirect(array('controller' => 'users', 'action' => 'login'));      
    } elseif (empty($this->data)) { // load the post
      $this->data = $this->Post->find(array('Post.id' => $id)); //, 'Post.user_id' => $this->Session->read('User.id'))); //read(null, $id);
      // Expand the URL using bitly
      if (!empty($this->data['Post']['url'])) {	      
	$this->data['Post']['url'] = $this->bitly_expand($this->data['Post']['url']);
      }
      /*    
    } elseif ($this->data['Post']['user_id'] != $this->Session->read('User.id')) { // check save attempt
      $this->Session->write('Session.referer', array('controller' => 'posts','action' => 'edit', $id));
      $this->redirect(array('controller' => 'users', 'action' => 'login'));            
      */
    } else { // save the post
      assert('is_string($this->data[\'Post\'][\'teaser\'])');
      assert('is_string($this->data[\'Post\'][\'title\'])');
      assert('is_string($this->data[\'Post\'][\'url\'])');

      $tmp = $this->Post->find(array('Post.id' => $id)); //, 'Post.user_id' => $this->Session->read('User.id'))); //read(null, $id);

      if ($tmp['Post']['user_id'] == $this->Session->read('User.id')) {
	// Shorten the URL using bitly
	if (!empty($this->data['Post']['url'])) {	      
	  $this->data['Post']['url'] = $this->bitly_shorten($this->data['Post']['url']);
	}	    
	
	// save the form
	if ($this->Post->save($this->data)) {	      	      
	  $id = $this->Post->id; // get new ID
	  $this->Session->setFlash('Post #'. $id .' updated successfully.');
	  $this->redirect(array('action' => 'view', $id));
	}
      } else {
	$this->Session->setFlash('You do not have the rights to edit post #'.$id);
	$this->redirect($this->referer());
      }
    }
  }
  
  /**
   Add a new post.
  */
  
  function add() {	
    $this->pageTitle = 'Add Post';
    if (!$this->Session->check('User.id')) {
      $this->Session->write('Session.referer', array('controller' => 'posts','action' => 'add'));
      $this->Session->setFlash('Please log in to add a new post!');
      $this->redirect(array('controller' => 'users', 'action' => 'login'));
    } elseif (!empty($this->data)) {
      assert('is_string($this->data[\'Post\'][\'teaser\'])');
      assert('is_string($this->data[\'Post\'][\'title\'])');
      assert('is_string($this->data[\'Post\'][\'url\'])');

      // Shorten the URL using bitly
      if (!empty($this->data['Post']['url'])) {	      
	$this->data['Post']['url'] = $this->bitly_shorten($this->data['Post']['url']);
      }	    

      $this->data['Post']['user_id'] = $this->Session->read('User.id');

      // save the form
      if ($this->Post->save($this->data)) {	      	      
	$id = $this->Post->id; // get new ID
	$this->Session->setFlash('Post #'. $id .' added successfully.');
	$this->redirect(array('action' => 'view', $id));
      }
    }
  }
  
  /**
   Flag a post as DELETED (AJAX)
  */

  function delete($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html
      // TODO: Check for ACL
      $this->Post->updateAll(array('Post.flags' => '-1'), array('Post.id' => $id));
      $post = $this->Post->find(array('Post.id' => $id));
      $post['bitly'] = $this->bitly_expand($post['Post']['url']);
      $this->set('post',$post);
      $this->layout = 'ajax';
    }
  }
    
}
?>