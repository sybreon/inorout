<?php
  /**
   INOROUT - Social Discussion Platform.
   Copyright (C) 2010 Shawn Tan <shawn.tan@sybreon.com>
 
   This program is free software: you can redistribute it and/or
   modify it under the terms of the GNU Affero General Public License
   as published by the Free Software Foundation, either version 3 of
   the License, or (at your option) any later version.
 
   This program is distributed in the hope that it will be useful, but
   WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
   Affero General Public License for more details.
   
   You should have received a copy of the GNU Affero General Public
   License along with this program.  If not, see
   <http://www.gnu.org/licenses/>.
  */
?>
<?php echo $javascript->link('prototype'); ?> 
<h3><?php 
    echo $html->link($post['Post']['title'], array('action' => 'view',
						   $post['Post']['id'])); 
?></h3><hr/>
<div id="vote" class="grid_1 alpha">
<?php
echo $html->image('emoticon_smile.png') . $post['Post']['ins']; 
echo $html->image('eye.png') . $post['Post']['views']; 
echo $html->image('emoticon_unhappy.png') . $post['Post']['outs']; 
?>
</div>
<div id="post" class="grid_7 omega">
<!-- embed preview -->
<?php echo $html->link('Link',$post['Post']['url']); ?>
<?php 
$strike = $post['Post']['flags'] & 0x01;
if ($strike == 1) { echo '<strike>'; }
?>
<?php echo $html->para('teaser', Sanitize::html($post['Post']['teaser'])); ?>
</strike>
</div>

<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_2 alpha">
  <li><?php echo $html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?></li>	
  <li id='actflg'><?php echo $ajax->link('Flag', array('controller' => 'posts', 'action' => 'flag', $post['Post']['id']), array('update' => 'actflg'), sprintf(__('Flag post #%s?', true), $post['Post']['id']));?></li>
  <li id='actdel'><?php echo $ajax->link('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('update' => 'actdel'), sprintf(__('Delete post #%s?', true), $post['Post']['id']));?></li>
</ul>
<div class="grid_6 omega">
<?php
  echo $html->image('http://www.gravatar.com/avatar/'. md5(strtolower(trim($post['User']['mail']))) .'?d=wavatar&r=g&s=16',
		    array('alt' => $post['User']['username'],
			  'url' => array('controller' => 'users',
					 'action' => 'view',
					 $post['User']['id']
					 )
			  )
		    );
  echo 'created: '. $post['Post']['created'] .' by ';
  echo $html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id']));
?>
</div>
<div class="clear">&nbsp;</div>
<dl class="grid_8 alpha omega">
<?php
  foreach ($post['Comment'] as $comm) {
  
  if ($comm['inout'] == 0) {
    echo '<dl id="c-out" class="grid_6 push_2 alpha omega">';
  } else {
    echo '<dl id="c-in" class="grid_6 alpha omega">';
  }
  
    echo '<dt>'. $comm['created'] .'</dt>';
    echo '<dd>'. $comm['comment'] .'</dd>';
  echo '</dl>';
}
?>
</dl>
<?php
  echo '<div id="f.comment" class="grid_6 push_1 alpha omega">';
  echo $form->create('Comment', array('controller' => 'comments', 'action' => 'add'));
  echo '<fieldset>';
  echo '<legend>Add Comment</legend>';
  echo $form->input('comment',array('rows'=>'9'));
  echo $form->radio('inout',array('1' => 'In', '0' => 'Out'), array('separator' => '', 'legend' => false));
  echo '</fieldset>';
  echo $form->end('Save');
  echo '</div>';
?>
<pre>
<?php print_r($post); ?>
</pre>