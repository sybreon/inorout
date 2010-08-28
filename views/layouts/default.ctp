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
echo $html->css('http://fonts.googleapis.com/css?family=Vollkorn|Cantarell:regular,bold');
echo $html->css(array('reset','text','960','inorout'));
echo $scripts_for_layout;
?>
</head>
<body id="<?php echo Router::url(''); ?>">
  <?php $session->flash(); ?>
<div style="background:#eee;">
  <div class="container_12">
  <div class="grid_9"><?=$this->element('dashboard');?></div>
  <div class="grid_3" id="sabm">by <?=$html->link('Saya Anak Bangsa Malaysia','http://www.sayaanakbangsamalaysia.net');?>&nbsp;&raquo;</div>
  <div class="clear">&nbsp;</div>
  </div>
  </div>
  <?php //if (Router::url('') === Router::url('/')): ?>
  <div class="container_12" id="container"><div class="grid_3">
     <?=$html->image('LOGO.png');?>
  </div>
  <div class="grid_2 prefix_3" id="count">
  <?=$html->link('&nbsp;',
		 array('controller' => 'pages',
		       'action' => 'group'),
		 array('class' => 'star',
		       'escape' => false,
		       'title' => 'Please contact us to organise group registrations!')
		 ); ?>
  </div>
  <div class="grid_4" style="">
   <?=$html->image('countdown.png',array('style' => 'float:left;padding-top:10px'));?>
    <p id="count">
<b>2,147,483</b><br/>unregistered voters &mdash; provided by <a href="http://www.spr.gov.my" target="_blank">SPR</a>
  </p>
  </div>
  <div class="clear">&nbsp;</div>
  </div>
  <?php //endif; ?>
  <div class="container_12" id="container">
  <ul id="pages" class="grid_12">
  <li><?=(!strstr(Router::url(''),Router::url(array('controller'=>'posts','action'=>'view')))) ? 
  $html->link('',array('controller' => 'posts', 'action' => 'index'), array('class' => 'btnspeak')): 
  $html->image('button_speak_clicked.png');?></li>
  <li><?=(!strstr(Router::url(''),Router::url(array('controller'=>'pages','action'=>'about')))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'about'), array('class' => 'btninfo')):
  $html->image('button_about_clicked.png');?></li>
  <li><?=(!strstr(Router::url(''),Router::url(array('controller'=>'pages','action'=>'news')))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'news'), array('class' => 'btnnews')):
  $html->image('button_news_clicked.png');?></li>
  <li><?=(!strstr(Router::url(''),Router::url(array('controller'=>'pages','action'=>'vote')))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'vote'), array('class' => 'btnvote')):
  $html->image('button_vote_clicked.png');?></li>
  <li><?=(!strstr(Router::url(''),Router::url(array('controller'=>'pages','action'=>'friends')))) ? 
  $html->link('',array('controller' => 'pages', 'action' => 'friends'), array('class' => 'btnfren')):
  $html->image('button_friends_clicked.png');?></li>
  </ul>
  <a name="inout">
  <div class="grid_12">
  <?php echo $content_for_layout; ?>
  </div>
  <div class="clear">&nbsp;</div>
  </div><!--container-->
  <div style="background:#eee;">
  <div class="container_12">
  <div class="grid_6" id="copy">Copyright &copy; 2010 to INOROUT.ORG</div>
  <div class="grid_6" id="fmenu"><a href="#inout">Top</a></div>
  <div class="clear">&nbsp;</div>
  </div><!--container-->
  </div>
  <pre>
  <?php echo $cakeDebug; ?>
  </pre>
  </body>
  </html>