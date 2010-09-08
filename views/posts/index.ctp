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
<div class="grid_6 alpha">
    <ul class="hmenu sort"><li class="first"><?=$html->link('click here for instructions',array('controller' => 'pages', 'action' => 'help'));?></li></ul>
    </div>
    <ul class="grid_6 omega sort hmenu" id="sort">sort by:&nbsp;
    <li class="first"><?=$paginator->sort('Date','id');?></li>
    <li><?=$paginator->sort('Ins','vins');?></li>
    <li><?=$paginator->sort('Outs','vouts');?></li>
    <li><?=$paginator->sort('Views','views');?></li>
    </ul>   
    <dl class="grid_6 alpha post" id="p-in">
    <?=$html->image('IN.png');?>
<? foreach ($posts_in as $post): ?>
<dt>
<? echo $this->element('scorepad',array('post' => $post)); ?>
<p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
<p class="teaser"><?=$text->truncate($text->stripLinks($post['Post']['teaser']),128); ?></p>
</dt>
<dd>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  <span class="comments"><?=$post['Post']['cins'] + $post['Post']['couts']?>&nbsp;comments</span>
  </dd>
  <?php endforeach; ?>
  </dl>

<dl class="grid_6 omega post" id="p-out">
  <?=$html->image('OUT.png');?>
  <?php foreach ($posts_out as $post): ?>
  <dt>
   <?php echo $this->element('scorepad',array('post' => $post)); ?>
  <p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
  <p class="teaser"><?=Sanitize::html($text->truncate($post['Post']['teaser'],128));?></p>
  </dt>
  <dd>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  <span class="comments"><?=$post['Post']['cins'] + $post['Post']['couts']?>&nbsp;comments</span>
  </dd>
  <?php endforeach; ?>
  </dl>

<div class="clear">&nbsp;</div>
<div class="grid_5 alpha"><?=$paginator->prev('&laquo Previous',array('escape' => false));?>&nbsp;</div>
<div class="grid_2" style="text-align:center"><?=$paginator->counter();?></div>
<div class="grid_5 omega" style="text-align:right">&nbsp;<?=$paginator->next('Next &raquo',array('escape' => false));?></div>
<div class="clear">&nbsp;</div>
<div class="grid_12 alpha omega">
<?=$html->image('add-post.png',
		array('alt' => 'Add a Post',
		      'url' => array('controller' => 'posts',
				     'action' => 'add')
		      )
		);?>&nbsp;
</div>
<div class="clear">&nbsp;</div>
