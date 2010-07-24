<?php
App::import('Core', 'HttpSocket');
App::import('Sanitize');
class PostsController extends AppController {

	var $name = 'Posts';
	var $helpers = array ('Form','Html','Text');
	/**
	 Default - lists all posts
	 */

	function index() {
	  $this->set('ins', $this->Post->find('all', 
						array('limit' => 10,
						      'conditions' => array('Post.ins >= Post.outs'),
						      'order' => 'Post.id DESC',
						      )
						)
		     );	  
	  $this->set('outs', $this->Post->find('all', 
						array('limit' => 10,
						      'conditions' => array('Post.outs >= Post.ins'),
						      'order' => 'Post.id DESC',
						      )
						)
		     );	  
	}

	/**
	 Retrieves and reads a single post.
	 */

	function post($id = null) {
	  $this->pageTitle = 'In/Out #'. $id;

	  // Increment counter once in a session
	  if (!$this->Session->check('Post.'.$id)) {
	    $this->Post->updateAll(array('Post.views' => 'Post.views+1'), array('Post.id' => $id));
	    $this->Session->write('Post.'.$id,'');
	  }

	  // Extract the post
	  $this->set('post',$this->Post->read(null,$id));
	  
	}

	/**
	 Flag a post as DELETED
	 */
	function delete($id = null) {
	  // TODO: Check for ACL
	  $this->Post->updateAll(array('Post.flags' => 'Post.flags|0x01'), array('Post.id' => $id));
	  $this->Session->setFlash('Post #'. $id .' flagged as deleted.');
	  $this->redirect(array('action' => 'post', $id));
	}

	/**
	 Edit an existing post
	 */
	function edit($id = null) {
	  if (empty($this->data)) {
	    $this->pageTitle = ($id > 0) ? 'Edit In/Out #'.$id : 'Add In/Out';
	    $this->data = $this->Post->read(null, $id);
	    // Shorten the URL using bitly
	    if (!empty($this->data['Post']['url'])) {	      
	      $HttpSocket = new HttpSocket();
	      $bitly = $HttpSocket->get('http://api.bit.ly/v3/expand', 
					array('format' => 'txt',
					      'login' => 'inorout',
					      'apiKey' => 'R_11acbfd4019e1d133a8dd8ebb339da03',
					      'shortUrl' => $this->data['Post']['url']
					      )
					); 	    
	      $this->data['Post']['url'] = trim($bitly); // strip whitespace
	    }
	  } else {
	    // Shorten the URL using bitly
	    if (!empty($this->data['Post']['url'])) {	      
	      $HttpSocket = new HttpSocket();
	      $bitly = $HttpSocket->get('http://api.bit.ly/v3/shorten', 
					array('format' => 'txt',
					      'login' => 'inorout',
					      'apiKey' => 'R_11acbfd4019e1d133a8dd8ebb339da03',
					      'longUrl' => $this->data['Post']['url']
					      )
					); 	    
	      $this->data['Post']['url'] = trim($bitly); // strip whitespace
	    }	    
	    // save the form
	    if ($this->Post->save($this->data)) {	      	      
	      $id = $this->Post->id; // get new ID
	      $this->Session->setFlash('Post #'. $id .' updated successfully.');
	      $this->redirect(array('action'=>'post', $id));
	    }
	  }
	}
}
?>