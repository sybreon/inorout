<?php

  //echo $this->
echo '<ul id="dashboard">';
echo '<li>'. $html->link('sign in',array('controller' => 'users', 'action' => 'login')) .'</li>';
echo '<li>'. $html->link('sign out',array('controller' => 'users', 'action' => 'logout')) .'</li>';
echo '</ul>';

?>