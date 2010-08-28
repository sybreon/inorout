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

class VotesController extends AppController {
  
  var $name = 'Votes';
  var $components = array('RequestHandler');
  var $helpers = array ('Form','Html','Ajax','Javascript','Time','Text');

  /**
   Vote IN/OUT
  */

  function vin($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html

      $this->loadModel('Post');

      $tmp = $this->Vote->find(array('Vote.user_id' => $this->Session->read('User.id'),
				     'Vote.post_id' => $id));
      
      //print_r($tmp);
      if (!isset($tmp['Vote'])) {
	// TODO: Check for ACL

	$tmp['Vote']['user_id'] = $this->Session->read('User.id');
	$tmp['Vote']['post_id'] = $id;
	$tmp['Vote']['vote'] = 1;

	$this->Vote->save($tmp);
	$this->Post->updateAll(array('Post.vins' => 'Post.vins+1'), array('Post.id' => $id));      
	
      }          

      $this->set('vote',$tmp);
      $this->layout = 'ajax';
    }	  
  }
  
  function vout($id = null) {
    if ($this->RequestHandler->isAjax()) {
      assert('is_numeric($id)'); // check input
      Configure::write('debug', 0); // dont want debug in ajax returned html

      $this->loadModel('Post');

      $tmp = $this->Vote->find(array('Vote.user_id' => $this->Session->read('User.id'),
				     'Vote.post_id' => $id));
      
      //print_r($tmp);
      if (!isset($tmp['Vote']['vote'])) {
	// TODO: Check for ACL

	$tmp['Vote']['user_id'] = $this->Session->read('User.id');
	$tmp['Vote']['post_id'] = $id;
	$tmp['Vote']['vote'] = 0;

	$this->Vote->save($tmp);
	$this->Post->updateAll(array('Post.vouts' => 'Post.vouts+1'), array('Post.id' => $id));      
	
      }          

      $this->set('vote',$tmp);
      $this->layout = 'ajax';
    }	  
  }   

}
?>