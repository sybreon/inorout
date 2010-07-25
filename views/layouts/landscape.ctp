<?php
/**
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php echo $html->charset(); ?>
<title><?php echo $title_for_layout; ?></title>
<?php
echo $html->meta('icon');
echo $html->css('reset');
echo $html->css('text');
echo $html->css('960');
echo $html->css('inorout');
echo $scripts_for_layout;
?>
</head>
<body>
<?php $session->flash(); ?>
<div class="container_12" id="container">
  <ul id="pages" class="grid_12">
  <li><?php echo $html->link('Home', array('controller' => 'posts', 'action' => 'index')); ?> </li>
  <li><?php echo $html->link('About Us', array('controller' => 'pages', 'action' => 'about')); ?> </li>
  <li><?php echo $html->link('Events', array('controller' => 'pages', 'action' => 'events')); ?> </li>
  <li><?php echo $html->link('Vote!', array('controller' => 'pages', 'action' => 'vote')); ?> </li>
  <li><?php echo $html->link('Friends', array('controller' => 'pages', 'action' => 'friends')); ?> </li>
  </ul>
  <div class="clear">&nbsp;</div>
  <div class="grid_12">
  <?php echo $this->element('dashboard'); ?>
  </div>
  <div class="clear">&nbsp;</div>
  <div class="grid_12">
  <?php echo $content_for_layout; ?>
  </div>
</div>
  <pre class="row">
  <?php echo $cakeDebug; ?>
  </pre>
  </body>
  </html>