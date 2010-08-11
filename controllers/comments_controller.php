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
    if (!empty($this->data)) {
      // add Comment
      //$uid = $this->Session->read('User.id');
      $this->data['Comment']['user_id'] = $this->Session->read('User.id');
      $this->data['Comment']['post_id'] = $this->data['Comment']['id'];
      unset($this->data['Comment']['id']);
      $this->set('comm',$this->data);
      $this->Comment->save($this->data);

      // increment Post.comment
      $this->loadModel('Post');
      $this->Post->updateAll(array('Post.comments' => 'Post.comments+1'), 
      			     array('Post.id' => $this->data['Comment']['post_id']));

      $this->redirect(array('controller' => 'posts',
			    'action' => 'view',
			    $this->data['Comment']['post_id']
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
  
}
?>