<?php echo $javascript->link('prototype');?>
<h3>Login</h3><hr/>
<p>No authentication information is stored on this site. You will need to sign in with your existing account on one of the following OpenID providers.</p>
<?php
echo $form->create('User', array('type' => 'post', 'action' => 'auth/'. $param . '?oid'));
//echo $form->submit('login-google.png');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-google.png" name="data[User][url]" value="g">');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-yahoo.png" name="data[User][url]" value="y">');
//echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-wordpress.png" name="data[User][url]" value="w">');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-myopenid.png" name="data[User][url]" value="m">');
//echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-livejournal.png" name="data[User][url]" value="http://livejournal.com">');
//echo $form->input('openid');
echo $form->end();
?>
<pre>
<?php
 //print_r($params);
?>
</pre>
