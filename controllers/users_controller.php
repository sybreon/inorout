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

App::import('Vendor','openid');

class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('RequestHandler');
	var $uses = array();


	public function login() {
	  $openid = new LightOpenID;
	  if ($this->RequestHandler->isPost()) {
	    if ($openid->validate()) {
	      $attr = $openid->getAttributes();
	      $this->Session->write('User.email',$attr['contact/email']);
	      $this->Session->write('User.nickname',$attr['namePerson/friendly']);
	      // find the user based on email
	      $this->redirect(array('controller' => 'posts', 'action' => 'index'));
	    } else {
	      $this->Session->setFlash('Authentication failed!');
	    }
	  } else {
	    $openid->identity = 'http://me.yahoo.com';
	    $openid->required = array('contact/email');//, 'namePerson/friendly');
	    //$openid->optional = array('namePerson/friendly');
	    $this->redirect($openid->authUrl());
	  }
	}

	public function logout() {
	  // destroy user session
	  $this->Session->delete('User');
	}

	public function auth() {
	  // extract the FC stuff
	  
	}
	
	/*
	public function login() {
	  $realm = 'http://'.$_SERVER['SERVER_NAME'];
	  $returnTo = $realm . '/~sybreon/users/login';

	  if ($this->RequestHandler->isPost()) {
            $this->makeOpenIDRequest($this->data['OpenidUrl']['openid'], $returnTo, $realm);
	  } elseif ($this->Openid->isOpenIDResponse()) {
	    $this->handleOpenIDResponse($returnTo);
	    $this->set('user',$this->Openid->getResponse($returnTo));
	  }
	}
	*/

	private function makeOpenIDRequest($openid, $returnTo, $realm) {
	  $required = array('email');
	  $optional = array('nickname');
	  $this->Openid->authenticate($openid, $returnTo, $realm, array('sreg_required' => $required, 'sreg_optional' => $optional));
	}
	
	private function handleOpenIDResponse($returnTo) {
	  $response = $this->Openid->getResponse($returnTo);
	  
	  if ($response->status == Auth_OpenID_SUCCESS) {
	    $sregResponse = Auth_OpenID_SRegResponse::fromSuccessResponse($response);
	    $sregContents = $sregResponse->contents();
	    
	    if ($sregContents) {
	      if (array_key_exists('email', $sregContents)) {
		debug($sregContents['email']);
	      }
	      if (array_key_exists('nickname', $sregContents)) {
		debug($sregContents['nickname']);
	      }
	    }
	  }
	}
	
	//var $helpers = array ('Form','Html','Text','Ajax','Javascript');
	//var $components = array('RequestHandler');
	// https://www.google.com/accounts/o8/id
	// http://yahoo.com

}
?>