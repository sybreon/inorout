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

App::import('Sanitize');
App::import('Vendor','bitly'); // Import LightOpenID library

class VotesController extends AppController {
  
  var $name = 'Votes';
  var $components = array('RequestHandler');
  var $helpers = array ('Form','Html','Ajax','Javascript','Time','Text');

  private function bitly_expand($url = null) {
    $bitly = new Bitly('inorout','R_11acbfd4019e1d133a8dd8ebb339da03');
    return $bitly->expandSingle($url);
  }

  /**
   Vote IN/OUT
  */

  function vin($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html

      $tmp = $this->Vote->find(array('Vote.user_id' => $this->Session->read('User.id'),
				     'Vote.post_id' => $id));
      
      //print_r($tmp);
      if (!isset($tmp['Vote'])) {
	// TODO: Check for ACL
	$this->loadModel('Post');
	$this->Post->updateAll(array('Post.vins' => 'Post.vins+1'), array('Post.id' => $id));      
	$tmp = $this->Post->find(array('Post.id' => $id));

	$this->loadModel('User');
	$this->User->updateAll(array('User.vins' => 'User.vins+10'), array('User.id' => $tmp['Post']['user_id']));
       

	$vote['Vote']['user_id'] = $this->Session->read('User.id');
	$vote['Vote']['post_id'] = $id;
	$vote['Vote']['vote'] = 1;

	$this->Vote->create();
	$this->Vote->save($vote);
	
      }          

      $this->set('vote',$vote);
      $this->layout = 'ajax';
    } else {
      $this->Session->write('Session.referer', array('controller' => 'posts','action' => 'view', $id));
      $this->Session->setFlash('Please log in to VOTE!');
      $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
  }
  
  function vout($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html

      $tmp = $this->Vote->find(array('Vote.user_id' => $this->Session->read('User.id'),
				     'Vote.post_id' => $id));
      
      //print_r($tmp);
      if (!isset($tmp['Vote']['vote'])) {
	// TODO: Check for ACL
	
	$this->loadModel('Post');
	$this->Post->updateAll(array('Post.vouts' => 'Post.vouts+1'), array('Post.id' => $id));      
	
	$tmp = $this->Post->find(array('Post.id' => $id));

	$this->loadModel('User');
	$this->User->updateAll(array('User.vouts' => 'User.vouts+10'), array('User.id' => $tmp['Post']['user_id']));

	$vote['Vote']['user_id'] = $this->Session->read('User.id');
	$vote['Vote']['post_id'] = $id;
	$vote['Vote']['vote'] = 0;

	$this->Vote->create();
	$this->Vote->save($vote);

      }          

      $this->set('vote',$vote);
      $this->layout = 'ajax';

    } else {
      $this->Session->write('Session.referer', array('controller' => 'posts','action' => 'view', $id));
      $this->Session->setFlash('Please log in to VOTE!');
      $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
  }   

  function flag($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html
      
      $this->loadModel('Post');
      $this->loadModel('Flag');

      $tmp = $this->Flag->find(array('Flag.user_id' => $this->Session->read('User.id'),
				     'Flag.post_id' => $id));

      $post = $this->Post->find(array('Post.id' => $id));
      
      //print_r($tmp);
      if (!isset($tmp['Flag']['flag'])) {
	// TODO: Check for ACL
		
	$tmp = $this->Post->find(array('Post.id' => $id));
	$this->loadModel('User');
	$this->User->updateAll(array('User.vouts' => 'User.vouts-1',
				     'User.vins' => 'User.vins-1'), array('User.id' => $tmp['Post']['user_id']));

	$tmp['Flag']['user_id'] = $this->Session->read('User.id');
	$tmp['Flag']['post_id'] = $id;
	$tmp['Flag']['flag'] = 0;

	$this->Flag->create();
	$this->Flag->save($tmp);

	if ($post['Post']['flags'] >= 9) {
	  $this->Post->updateAll(array('Post.flags' => '-1'), array('Post.id' => $id));      
	  $post['Post']['flags'] = -1;
	} else {
	  $this->Post->updateAll(array('Post.flags' => 'Post.flags+1'), array('Post.id' => $id));      
	  $post['Post']['flags'] = $post['Post']['flags'] + 1;
	}	
      }          
      
      $post['bitly'] = $this->bitly_expand($post['Post']['url']);

      $this->set('post', $post);    
      $this->set('flag', $tmp);
      $this->layout = 'ajax';
    }	  
  }

}
?>