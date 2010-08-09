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
<div class="container_12" id="container">
  <ul id="pages" class="grid_12">
  <li><?php echo $html->link('',array('controller' => 'posts', 'action' => 'index'), array('class' => 'btnspeak')); ?></li>
  <li><?php echo $html->link('',array('controller' => 'pages', 'action' => 'about'), array('class' => 'btninfo')); ?></li>
  <li><?php echo $html->link('',array('controller' => 'pages', 'action' => 'news'), array('class' => 'btnnews')); ?></li>
  <li><?php echo $html->link('',array('controller' => 'pages', 'action' => 'vote'), array('class' => 'btnvote')); ?></li>
  <li><?php echo $html->link('',array('controller' => 'pages', 'action' => 'friends'), array('class' => 'btnfren')); ?></li>
  </ul>
  <div class="clear">&nbsp;</div>
  <div class="grid_12">
  <?php echo $this->element('dashboard'); ?>
  </div>
  <div class="clear">&nbsp;</div>
   <div class="grid_12">
  <?php echo $content_for_layout; ?>
  </div>
  <div class="clear">&nbsp;</div>
  </div>
  <pre>
  <?php echo $cakeDebug; ?>
  </pre>
  </body>
  </html>