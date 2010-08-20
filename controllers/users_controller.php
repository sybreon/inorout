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
  var $helpers = array ('Form','Html','Ajax','Javascript','Time','Text');
  
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
    
    if (!isset($this->params['url']['openid_mode'])) {
      // do OpenID
      switch ($this->data['User']['url']) {
      case 'g':	$this->requestID('http://www.google.com/accounts/o8/id'); break;
      case 'y':	$this->requestID('http://me.yahoo.com'); break;
      case 'w':	$this->requestID('http://wordpress.com'); break;
      case 'm':	$this->requestID('http://myopenid.com'); break;	
      }

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
	$nama = (isset($attr['namePerson/friendly'])) ? $attr['namePerson/friendly'] : preg_replace('/^([^@]+)(@.*)$/', '$1', $attr['contact/email']);	
	$oid = md5(trim($openid->identity)); // hash the id returned

	// find the user based on claimed_id
	if (($tmp = $this->User->findByOid($oid)) == false) {
	  // create user	  
	  $tmp['User']['oid'] = $oid;
	  $tmp['User']['mail'] = $mail;
	  $tmp['User']['nama'] = $nama;
	  
	  $this->User->create();
	  $this->User->save($tmp);
	  $this->Session->setFlash('Welcome to In/Out user #'. $this->User->id .'!');
	  // TODO: redirect to n00b page.
	} else {
	  // update user	  
	  $this->User->id = $tmp['User']['id'];
	  $this->User->saveField('mail',$mail);
	  $this->User->saveField('nama',$nama);
	  $this->Session->setFlash('Welcome back user #'. $this->User->id .'!');
	}

	// save to session
	$this->Session->write('User.mail', $mail);      
	$this->Session->write('User.nama', $nama);
	$this->Session->write('User.oid', $oid);
	$this->Session->write('User.id', $this->User->id);
	
	// redirect to source/default
	$url = ($this->Session->check('Session.referer')) ? $this->Session->read('Session.referer') : array('controller' => 'posts', 'action' => 'index');	
	$this->redirect($url);

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
    //$this->redirect(array('controller' => 'users', 'action' => 'login'));    
    $this->redirect($this->referer());
  }
  
  /**
   param is the return URL in Base64 encoding
  */
  
  public function login($param = null) {
    $this->pageTitle = 'OpenID Login';
    //$this->set('params',$this->params);
    $this->set('param',$param);
  }  


  public function view($id = null) {
    $this->PageTitle = 'User #'. $id;
    
    $this->set('user',$this->User->read(null,$id));    

  }
}
?>