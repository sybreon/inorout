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

  //App::import('Sanitize');

class CommentsController extends AppController {

  var $name = 'Comments';
  //var $helpers = array ('Form','Html','Text','Ajax','Javascript');
  var $components = array('RequestHandler');
  
  /**
   Add a single comment either to IN/OUT side.
  */
  
  function add() {
    //assert(isset($this->Session->read('User.id')));
    if (!$this->Session->check('User.id')) {
      $this->Session->write('Session.referer', $this->referer());
      $this->redirect(array('controller' => 'users', 'action' => 'login'));
    } elseif (!empty($this->data)) {
      assert('is_string($this->data[\'Comment\'][\'comment\'])');
      assert('is_numeric($this->data[\'Comment\'][\'inout\'])');
      assert('is_numeric($this->data[\'Comment\'][\'post_id\'])');
      assert('is_numeric($this->data[\'Comment\'][\'user_id\'])');
      assert('is_numeric($this->data[\'Comment\'][\'parent_id\'])');

      // add Comment
      $this->data['Comment']['user_id'] = $this->Session->read('User.id'); // force user_id

      $this->set('comm',$this->data);
      $this->Comment->save($this->data);

      // increment Post.comment
      $this->loadModel('Post');
      switch ($this->data['Comment']['inout']) {
      case 1:
	$this->Post->updateAll(array('Post.cins' => 'Post.cins+1'), 
			       array('Post.id' => $this->data['Comment']['post_id']));
	break;
      case 0:
	$this->Post->updateAll(array('Post.couts' => 'Post.couts+1'), 
			       array('Post.id' => $this->data['Comment']['post_id']));
	break;     	
      }
      
      $this->redirect(array('controller' => 'posts',
			    'action' => 'view',
			    $this->data['Comment']['post_id'].'#c'.$this->Comment->id
			    )
		      );      
    }
  }
  
  /**
   List all the comments relevant to a post
  */
  
  function post($id = null) {
    $this->set('post_comments', 
	       $this->Comment->find('threaded', 
				    array('conditions' => array('Comment.post_id' => $id))));	  
  }

  function reply($id = null) {
    $this->Session->write('Session.referer', array('controller' => 'posts','action' => 'view', $id));
    $this->Session->setFlash('Please log in to SPEAK!');
    $this->redirect(array('controller' => 'users', 'action' => 'login'));    
  }

  function flag($id = null) {
    $this->Session->write('Session.referer', array('controller' => 'posts','action' => 'view', $id));
    $this->Session->setFlash('Please log in to FLAG!');
    $this->redirect(array('controller' => 'users', 'action' => 'login'));    
  }
  
}
?>