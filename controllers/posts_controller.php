<?php
/*
 INOROUT - Social Discussion Platform
 Copyright (C) 2010 Shawn Tan <shawn.tan@sybreon.com>
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as
 published by the Free Software Foundation, either version 3 of the
 License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 Affero General Public License for more details.
   
 You should have received a copy of the GNU Affero General Public
 License along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

App::import('Core', 'HttpSocket');
App::import('Sanitize');
class PostsController extends AppController {

	var $name = 'Posts';
	var $helpers = array ('Form','Html','Text','Ajax','Javascript');
	var $components = array('RequestHandler');

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

	function view($id = null) {
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
	 Edit an existing post
	 */
	function edit($id = null) {
	  $this->pageTitle = ($id != null) ? 'Edit In/Out #'.$id : 'Add In/Out';
	  if (empty($this->data)) {
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
	  Configure::write('debug', 0); // dont want debug in ajax returned html
	  // TODO: Check for ACL
	  $this->Post->updateAll(array('Post.flags' => '-1'), array('Post.id' => $id));
	  $this->set('result', 'Deleted');
	  $this->layout = 'ajax';
	}

	/**
	 Flag a post as FLAGGED (AJAX)
	 */
	function flag($id = null) {
	  Configure::write('debug', 0); // dont want debug in ajax returned html
	  // TODO: Check for ACL
	  $this->Post->updateAll(array('Post.flags' => 'Post.flags+1'), array('Post.id' => $id));
	  $this->set('result', 'Flagged');
	  $this->layout = 'ajax';
	}

}
?>