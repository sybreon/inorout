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

  //App::import('Core', 'HttpSocket');
  //App::import('Sanitize');

App::import('Vendor','openid'); // Import LightOpenID library

class UsersController extends AppController {
  
  var $name = 'Users';
  var $components = array('RequestHandler');
  var $helpers = array ('Form','Html','Ajax','Javascript');
  //var $uses = array();
  
  /**
   Launch OpenID request.
   */
  
  protected function requestID($url = null) {
    // openid form login
    $openid = new LightOpenID;
    $openid->identity = $url;
    $openid->required = array('contact/email','namePerson/friendly');
    //$openid->optional = array('namePerson/friendly');
    $this->redirect($openid->authUrl());
  }

  /**
   Authenticate OpenID response.
   */

  public function auth($param = null) {	  
    
    if (isset($this->data['User']['url'])) {
      $this->requestID($this->data['User']['url']);

    } elseif ($this->params['url']['openid_mode'] == 'cancel') {	    
      // openid cancel
      $this->Session->setFlash('Authentication canceled!');
      $this->redirect(array('controller' => 'users', 'action' => 'login', $param));
      
    } else { //($this->params['url']['openid_mode'] == 'id_res') {
      // openid callback
      $openid = new LightOpenID;
      if ($openid->validate()) {
	// valid OpenID reply
	$attr = $openid->getAttributes(); // extract attributes
	$mail = (isset($attr['contact/email'])) ? md5(strtolower(trim($attr['contact/email']))) : '';
	$nama = (isset($attr['namePerson/friendly'])) ? $attr['namePerson/friendly'] : 'Anonymous';
	
	$oid = md5(trim($openid->identity)); // hash the id returned
	
	// find the user based on claimed_id
	if ($this->User->findByOid($oid) == false) {
	  // create user	  
	  $this->data['User']['oid'] = $oid;
	  $this->data['User']['mail'] = $mail;
	  $this->data['User']['nama'] = $nama;
	  
	  $this->User->create();
	  $this->User->save($this->data);
	} else {
	  // update user	  
	  $this->data['User']['oid'] = $oid;
	  $this->data['User']['mail'] = $mail;
	  $this->data['User']['nama'] = $nama;

	  $this->User->save($this->data);
	}

	// save to session
	$this->Session->write('User.mail', $mail);      
	$this->Session->write('User.nama', $nama);
	$this->Session->write('User.oid', $oid);
	$this->Session->write('User.id', $this->User->id);
	
	$this->Session->setFlash('Authentication success!');
	$this->redirect(array('controller' => 'posts', 'action' => 'index'));
      } else {
	$this->Session->setFlash('Authentication failed!');
	$this->redirect(array('controller' => 'users', 'action' => 'login', $param));
      }
    }
  }
  
  /*
   Destroy session.
   */

  public function logout() {
    // destroy user session
    $this->Session->delete('User');
    $this->redirect(array('controller' => 'users', 'action' => 'login'));    
  }
  
  /**
   param is the return URL in Base64 encoding
  */
  
  public function login($param = null) {
    //$this->set('params',$this->params);
    $this->set('param',$param);
  }  
}
?>