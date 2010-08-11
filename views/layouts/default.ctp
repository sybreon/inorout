<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
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
//echo $html->css('grid');
echo $html->css('inorout');
echo $scripts_for_layout;
?>
</head>
<body id="<?php echo Router::url(''); ?>">
  <?php $session->flash(); ?>
  <div style="background:#eee;">
  <div class="container_12">
  <?=$this->element('dashboard');?>
  </div>
  </div>
  <div class="container_12" id="container">
  <div class="grid_3">
  LOGO
  </div>
  <div class="grid_6 prefix_3">
  BANNER
  </div>
  <div class="clear">&nbsp;</div>
  <ul id="pages" class="grid_12">
  <li><?=(Router::url('') != Router::url(array('controller'=>'posts','action'=>'index'))) ? 
  $html->link('',array('controller' => 'posts', 'action' => 'index'), array('class' => 'btnspeak')): 
  $html->image('button_speak_clicked.png');?></li>
  <li><?=(Router::url('') != Router::url(array('controller'=>'pages','action'=>'about'))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'about'), array('class' => 'btninfo')):
  $html->image('button_info_clicked.png');?></li>
  <li><?=(Router::url('') != Router::url(array('controller'=>'pages','action'=>'news'))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'news'), array('class' => 'btnnews')):
  $html->image('button_news_clicked.png');?></li>
  <li><?=(Router::url('') != Router::url(array('controller'=>'pages','action'=>'vote'))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'vote'), array('class' => 'btnvote')):
  $html->image('button_vote_clicked.png');?></li>
  <li><?=(Router::url('') != Router::url(array('controller'=>'pages','action'=>'friends'))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'friends'), array('class' => 'btnfren')):
  $html->image('button_friends_clicked.gif');?></li>
  </ul>
  <div class="grid_12">
  <?php echo $content_for_layout; ?>
  </div>
  <div class="clear">&nbsp;</div>
  </div><!--container-->
  <div style="background:#eee;">
  <div class="container_12">
  Copyright &copy; 2010 to INOROUT.ORG
  </div>
  </div>
  <pre>
  <?php echo $cakeDebug; ?>
  </pre>
  </body>
  </html>