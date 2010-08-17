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
click here for instructions
</div>
<div class="grid_6 omega" style="text-align:right;">
sort by
</div>
<dl class="grid_6 alpha post" id="p-in">
  <?php foreach ($posts_in as $post): ?>
  <dt>
    <?php echo $this->element('scorepad',array('ins'=>$post['Post']['ins'],'outs'=>$post['Post']['outs'],'views'=>$post['Post']['views']));?>
  <p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
  <p class="teaser"><?=$text->truncate($text->stripLinks($post['Post']['teaser']),128); ?></p>
  </dt>
  <dd>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  <span class="comments"><?=$post['Post']['comments']?>&nbsp;comment(s)</span>
  </dd>
  <?php endforeach; ?>
  </dl>

<dl class="grid_6 omega post" id="p-out">
  <?php foreach ($posts_out as $post): ?>
  <dt>
    <?php echo $this->element('scorepad',array('ins'=>$post['Post']['ins'],'outs'=>$post['Post']['outs'],'views'=>$post['Post']['views']));?>
  <p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
  <p class="teaser"><?=Sanitize::html($text->truncate($post['Post']['teaser'],128));?></p>
  </dt>
  <dd>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  <span class="comments"><?=$post['Post']['comments']?>&nbsp;comment(s)</span>
  </dd>
  <?php endforeach; ?>
  </dl>

<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_3 alpha">
<li><?=$html->link('Add Post', array('action' => 'add'));?></li>
</ul>
<div class="grid_9 omega">
</div>