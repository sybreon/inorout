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

  /*echo '<dl class="grid_6 alpha" id="p-in">';
foreach ($posts_in as $post) { 

  echo '<dt><div class="meta"><div class="in"><p>'. $post['Post']['ins'] .'</p></div><div class="out"><p>'. $post['Post']['outs'] .'</p></div><div class="view"><p>'. $post['Post']['views'] .'</p></div></div>';
  echo '<div class="teaser"><h3>'. $html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])) .'</h3><p>'. $text->truncate($text->stripLinks($post['Post']['teaser']),128) .'</p></div></dt>';  
  echo '<dd>'. $post['Post']['created'] .' - '. $html->link($post['User']['nama'],array('controller' => 'users','action' => 'view', $post['User']['id'])) .'</dd>';

}
echo '</dl>'
  */
?>


<dl class="grid_6 alpha post" id="p-in">
  <?php foreach ($posts_in as $post): ?>
  <dt>
    <?php echo $this->element('scorepad',array('ins'=>$post['Post']['ins'],'outs'=>$post['Post']['outs'],'views'=>$post['Post']['views']));?>
  <div class="teaser">
  <p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
  <p><?=$text->truncate($text->stripLinks($post['Post']['teaser']),128); ?></p>
  </div>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  </dt>
  <dd>
  </dd>
  <?php endforeach; ?>
  </dl>

<dl class="grid_6 omega post" id="p-out">
  <?php foreach ($posts_out as $post): ?>
  <dt>
    <?php echo $this->element('scorepad',array('ins'=>$post['Post']['ins'],'outs'=>$post['Post']['outs'],'views'=>$post['Post']['views']));?>
  <p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
  <p class="teaser"><?=Sanitize::html($text->truncate($post['Post']['teaser'],128));?></p>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  </dt>
  <dd>
  </dd>
  <?php endforeach; ?>
  </dl>

<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_3 alpha">
    <li><?php echo $html->link('Add Post', array('action' => 'add'));?></li>
</ul>
<div class="grid_9 omega">
</div>
