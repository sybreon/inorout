<?php

$id = ($session->check('User.id')) ? $session->check('User.id') : 0;
  //echo $this->
echo '<ul id="dashboard">';

if ($session->check('User.id')) {
  echo '<img src="http://www.gravatar.com/avatar/'. $session->read('User.mail') .'?s=22&r=pg&d=mm" />';
  echo '<li>'. $html->link($session->read('User.nama'),array('controller' => 'users', 'action' => 'view', $id)) .'</li>';
  echo '<li>'. $html->link('sign out',array('controller' => 'users', 'action' => 'logout', $id)) .'</li>';
 } else {
  echo '<li>'. $html->link('sign in',array('controller' => 'users', 'action' => 'login')) .'</li>';
 }

echo '</ul>';

?>