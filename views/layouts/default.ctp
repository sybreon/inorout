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
<link rel="alternate" type="application/rss+xml" title="rss" href="<?=Router::url(array('controller' => 'rsses'),true);?>">
<?=$html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=8'));?>
<?=$html->tag('title',$title_for_layout);?>
<?php
echo $html->meta('icon');
echo $html->css('http://fonts.googleapis.com/css?family=Vollkorn|Cantarell:regular,bold');
echo $html->css(array('reset','text','960','inorout'));
echo $scripts_for_layout;
?>
</head>
<body id="<?=Router::url('');?>">
  <?php $session->flash(); ?>
<div style="background:#eee;">
  <div class="container_12">
  <div class="grid_12"><?=$this->element('dashboard');?></div>
  <div class="clear">&nbsp;</div>
  </div>
  </div>
  <div class="container_12" id="container"><div class="grid_3">
   <?=$html->link($html->image('LOGO.png'),
			array('controller' => 'posts',
			      'action' => 'index'),
			array('escape' => false));?>
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
																 <b>2,241,565</b><br/>unregistered voters &mdash; provided by <a href="http://www.spr.gov.my" target="_blank">SPR</a>
   </p>
  </div>
  <div class="clear">&nbsp;</div>
  </div>
  <div class="container_12" id="container">
  <ul id="pages" class="grid_12 hmenu">
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
  <li class="sprite"><?=$html->link('',
				    'http://www.facebook.com/pages/IN-OUT/118079328213929',
				    array('class' => 'fb',
					  'target' => '_blank'));?></li>
  <li class="sprite"><?=$html->link('',
				    'http://twitter.com/inoutmsia',
				    array('class' => 'twit',
					  'target' => '_blank'));?></li>
  <li class="sprite"><?=$html->link('',
				    array('controller' => 'rsses'),
				    array('class' => 'rss',
					  'target' => '_blank'));?></li>
  </ul>
  <div class="clear"><a name="inout">&nbsp;</a></div>
  <div class="grid_12">
  <?php echo $content_for_layout; ?>
  </div>
  <div class="clear">&nbsp;</div>
  </div><!--container-->
  <div style="background:#eee;">
  <div class="container_12">
    <div class="grid_6 copy">Copyright &copy; 2010 to INOROUT.ORG. Source on <?=$html->link('GitHub','http://github.com/sybreon/inorout');?>.</div>
  <ul id="fmenu" class="grid_6 hmenu copy">
   <li class="first"><?=$html->link('Speak',array('controller' => 'posts', 'action' => 'index'));?></li>
   <li><?=$html->link('About',array('controller' => 'pages', 'action' => 'about'));?></li>
   <li><?=$html->link('News',array('controller' => 'pages', 'action' => 'news'));?></li>
   <li><?=$html->link('Vote',array('controller' => 'pages', 'action' => 'vote'));?></li>
   <li><?=$html->link('Friends',array('controller' => 'pages', 'action' => 'friends'));?></li>
   <li><a href="#inout" style="border-right:none;">Top</a></li>
  </ul>
  <div class="clear">&nbsp;</div>
  </div><!--container-->
  <div class="container_12"><p class="grid_12" align="center" style="font-size:footer"><b>Disclaimer:</b> While INOROUT.ORG takes every care to remove any racist or deragatory comments on this site, it will not be responsible for such comments posted prior to its removal and all civil and criminal liabilities arisint therefrom and in connection with vest solely in the original maker of the comment.
  </p></div>
  </div>
  <pre>
  <?php echo $cakeDebug; ?>
  </pre>
  </body>
  </html>
  <!-- Copyright (C) 2010 to Shawn Tan. All Rights Reserved. -->