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
  var $helpers = array ('Form','Html','Text','Ajax','Javascript','Time');
  var $components = array('RequestHandler');

  
  private function bitly_shorten($url = null) {
    $bitly = new Bitly('inorout','R_11acbfd4019e1d133a8dd8ebb339da03');
    return $bitly->shortenSingle($url);
  }
  
  private function bitly_expand($url = null) {
    $bitly = new Bitly('inorout','R_11acbfd4019e1d133a8dd8ebb339da03');
    return $bitly->expandSingle($url);
  }
  
  /**
   Default - lists all posts
  */
  
  function index() {
    $this->set('posts_in', $this->Post->find('all', 
					     array('limit' => 10,
						   'conditions' => array('Post.ins >= Post.outs', 'Post.flags >= 0'),
						   'order' => 'Post.id DESC',
						   )
					     )
	       );	  
    $this->set('posts_out', $this->Post->find('all',
					      array('limit' => 10,
						    'conditions' => array('Post.outs >= Post.ins', 'Post.flags >= 0'),
						    'order' => 'Post.id DESC',
						    )
					      )
	       );	  
    //$this->layout = 'landscape';
    $this->set('dump',$this->data);
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
    $post['bitly'] = $this->bitly_expand($post['Post']['url']);

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
   Shorten the URL
  */
  function bitly() {
    Configure::write('debug', 0); // dont want debug in ajax returned html
    if (!empty($this->data['Post']['url'])) {	      
      $HttpSocket = new HttpSocket();
      $bitly = $HttpSocket->get('http://api.bit.ly/v3/shorten', 
				array('format' => 'txt',
				      'login' => 'inorout',
				      'apiKey' => 'R_11acbfd4019e1d133a8dd8ebb339da03',
				      'longUrl' => $this->data['Post']['url']
				      )
				); 	    
      $this->set('bitly', trim($bitly)); // strip whitespace
    }	    	  
    $this->layout = 'ajax';
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
  
  /**
   Flag a post as FLAGGED (AJAX)
  */

  function flag($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html
      // TODO: Check for ACL
      $this->Post->updateAll(array('Post.flags' => 'Post.flags+1'), array('Post.id' => $id));
      $post = $this->Post->find(array('Post.id' => $id));
      $post['bitly'] = $this->bitly_expand($post['Post']['url']);
      $this->set('post',$post);
      $this->layout = 'ajax';
    }
  }
  
  /**
   Vote IN/OUT
  */

  function vin($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html
      // TODO: Check for ACL
      $this->Post->updateAll(array('Post.ins' => 'Post.ins+1'), array('Post.id' => $id));
      //$this->set('post', );
      $this->layout = 'ajax';
    }	  
  }
  
  function vout($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html
      // TODO: Check for ACL
      $this->Post->updateAll(array('Post.outs' => 'Post.outs+1'), array('Post.id' => $id));
      //$this->set('result', 'Flagged');
      $this->layout = 'ajax';
    }	  
  }

}
?>