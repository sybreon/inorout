<?php
/*
 INOROUT - Social Discussion Platform
 Copyright (C) 2010 Shawn Tan <shawn.tan@sybreon.com>
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as
 published by the Free Software Foundation, either version 3 of the
 License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 Affero General Public License for more details.
   
 You should have received a copy of the GNU Affero General Public
 License along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php echo $javascript->link('prototype'); ?>
<h3><?php echo $html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?></h3>
<hr/>

<!-- embed preview -->
<small>Created: <?php echo $post['Post']['created']?></small>
<?php echo $html->link('Link',$post['Post']['url']); ?>
<?php $strike = $post['Post']['flags'] & 0x01;
if ($strike == 1) { echo '<strike>'; }
?>
<?php echo $html->para('teaser', Sanitize::html($post['Post']['teaser'])); ?>
</strike>

<div class="clear">&nbsp;</div>
<ul id="acts">
	<li><?php echo $html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?></li>	
	<li id='actflg'><?php echo $ajax->link('Flag', array('controller' => 'posts', 'action' => 'flag', $post['Post']['id']), array('update' => 'actflg'), sprintf(__('Are you sure you want to flag In/Out #%s?', true), $post['Post']['id']));?></li>
	<li id='actdel'><?php echo $ajax->link('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('update' => 'actdel'), sprintf(__('Are you sure you want to delete In/Out #%s?', true), $post['Post']['id']));?></li>
</ul>
