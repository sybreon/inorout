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
<h4><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></h4>
<hr/>
<div id="vote" class="grid_2 alpha">
<?php
echo $html->image('emoticon_smile.png') . $post['Post']['ins']; 
echo $html->image('eye.png') . $post['Post']['views']; 
echo $html->image('emoticon_unhappy.png') . $post['Post']['outs']; 
?>
</div>
<div id="post" class="grid_7 omega">
<!-- embed preview -->
<?php 
  //  echo $html->link('Link',$post['Post']['url']); 
  $strike = ($post['Post']['flags'] == -1) ? 'strike' : 'p';
echo $html->tag($strike, Sanitize::html($post['Post']['teaser'])); 
?>
</div>
<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_3 alpha">
  <li><?php echo $html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?></li>	  
  <li id="actflg">
  <?php 
  if ($post['Post']['flags'] > 0) {
    echo $ajax->link('Flag ('. $post['Post']['flags'] .')', array('controller' => 'posts', 'action' => 'flag', $post['Post']['id']), array('update' => 'actflg'), sprintf(__('Flag post #%s?', true), $post['Post']['id']));
  } else {
    echo $ajax->link('Flag', array('controller' => 'posts', 'action' => 'flag', $post['Post']['id']), array('update' => 'actflg'), sprintf(__('Flag post #%s?', true), $post['Post']['id']));
  }
?></li>
<li id="actdel">
  <?php 
  if ($post['Post']['flags'] == -1) {
    echo '<a href="#" class="disable">Deleted</a>';
  } else {
    echo $ajax->link('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('update' => 'actdel'), sprintf(__('Delete post #%s?', true), $post['Post']['id']));
  }
?></li>
</ul>
<div class="grid_5 omega">
<?php
  echo $html->image('http://www.gravatar.com/avatar/'. $post['User']['mail'] .'?d=mm&r=pg&s=16',
		    array('alt' => $post['User']['nama'],
			  'url' => array('controller' => 'users',
					 'action' => 'view',
					 $post['User']['id']
					 )
			  )
		    );
  echo 'created: '. $post['Post']['created'] .' by ';
  echo $html->link($post['User']['nama'], array('controller' => 'users', 'action' => 'view', $post['User']['id']));
?>
</div>
<div class="clear">&nbsp;</div>
<dl class="grid_12 alpha omega">
    <?php foreach ($post_comments as $comment): ?>
    <?php if ($comment['Comment']['inout'] == 0): ?>
     <dl id="c-out" class="grid_10 push_2 alpha omega comment">
	<?php else: ?>
	<dl id="c-in" class="grid_10 alpha omega comment">
	   <?php endif;?>

<dt><?=$comment['Comment']['comment']?></dt>
    <dd><?=$time->niceShort($comment['Comment']['created'])?> &ndash; <?=$comment['User']['nama']?></dd>

    // replies
    <ul class="grid_9 push_1 alpha omega reply">
    <?php foreach ($comment['children'] as $reply): ?>
     <li><?=$reply['Comment']['comment']?> &ndash; <?=$html->link($reply['User']['nama'],array('controller'=>'users','action'=>'view',$reply['User']['id']))?></li>
<?php endforeach; ?>
</ul>   
</dl>
<?php endforeach; ?>
</dl>
<?php
for ($i=0;$i<2;$i++) {
  $pad = ($i == 0) ? 'alpha' : 'omega';
  $inout = ($i == 0) ? 1 : 0;
  echo '<div id="fcomm'. $inout .'" class="grid_6 form '. $pad .'">';
  echo $form->create('Comment', array('controller' => 'comments', 'action' => 'add'));
  echo '<fieldset>';
  echo '<legend>Add Comment</legend>';
  echo $form->input('comment',array('rows'=>'9'));
  //echo $form->radio('inout',array('1' => 'In', '0' => 'Out'), array('separator' => '', 'legend' => false));
  echo '</fieldset>';
  echo $form->hidden('id', array('value' => $post['Post']['id']));
  echo $form->hidden('inout', array('value' => $inout));
  echo $form->end('Save');
  echo '</div>';
 }
?>
  <div class="clear">&nbsp;</div>
<pre>
<?php print_r($post_comments); ?>
</pre>