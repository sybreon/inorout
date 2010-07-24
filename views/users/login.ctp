<?php
  // app/views/users/login.ctp
if (isset($message)) {
  echo '<p class="error">'.$message.'</p>';
 }
echo $form->create('User', array('type' => 'post', 'action' => 'login'));
echo $form->input('OpenidUrl.openid', array('label' => false));
echo $form->end('Login');
?>
<form action="" method="post">
   OpenID: <input type="text" name="openid_identifier" /> <button>Submit</button>
</form>

<pre>
<?php
print_r($user);
?>
</pre>