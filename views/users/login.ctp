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
?>
<?php echo $javascript->link('prototype');?>
<h3>Login</h3>
<p>You will need to sign in with your existing account on one of the following OpenID providers.</p>
<?php
echo $form->create('User', array('type' => 'post', 'action' => 'auth/'. $param . '?oid'));
//echo $form->submit('login-google.png');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login/google.png" name="data[User][url]" value="g">');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login/yahoo.png" name="data[User][url]" value="y">');
//echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login/wordpress.png" name="data[User][url]" value="w">');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login/myopenid.png" name="data[User][url]" value="m">');
//echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login/livejournal.png" name="data[User][url]" value="http://livejournal.com">');
//echo $form->input('openid');
echo $form->end();
?>
<pre>
<?php
 //print_r($params);
?>
</pre>
