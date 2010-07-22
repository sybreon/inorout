<?php
class PostsController extends AppController {

	var $name = 'Posts';

	function index() {
	  $this->set('ins', $this->Post->find('all', 
						array('limit' => 10,
						      'order' => 'Post.id DESC',
						      'conditions' => array('Post.ins >= Post.outs'),
						      )
						)
		     );	  
	  $this->set('outs', $this->Post->find('all', 
						array('limit' => 10,
						      'order' => 'Post.id DESC',
						      'conditions' => array('Post.outs >= Post.ins'),
						      )
						)
		     );	  
	}

	/**
	 Add a new post.
	 */

	function add() {
	  $this->pageTitle = 'Add a Post';
	  // check if form is submitted
	  if (!empty($this->data)) {	    
	    // Shorten the URL if it is > 128
	    if (!empty($this->data['Post']['url'])) {	      
	      App::import('Core', 'HttpSocket');
	      $HttpSocket = new HttpSocket();
	      // use bitly api
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
	      $this->Session->setFlash('Your post was added successfully!');
	      $this->redirect(array('action'=>'index'));
	    }	    
	  }
	}

	/**
	 Retrieves and reads a single post.
	 */

	function post($id = null) {
	  $this->Post->id = $id;
	  $this->set('post',$this->Post->read());
	}
}
?>