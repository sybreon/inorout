<?php echo $javascript->link('prototype');?>
<h3>Login</h3><hr/>
<p>No authentication information is stored on this site. You will need to sign in with one of the following OpenID providers.</p>
<?php
echo $form->create('User', array('type' => 'post', 'action' => 'auth/'. $param . '?oid'));
//echo $form->submit('login-google.png');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-google.png" name="data[User][url]" value="https://www.google.com/accounts/o8/id">');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-yahoo.png" name="data[User][url]" value="http://me.yahoo.com">');
echo $html->div('oidbut','<input type="image" src="'. $this->webroot .'img/login-myopenid.png" name="data[User][url]" value="http://myopenid.com">');
//echo $form->input('openid');
echo $form->end();
?>
<pre>
<?php
 //print_r($params);
?>
</pre>
