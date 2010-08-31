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
 License along with this program.  If not, see
 <http://www.gnu.org/licenses/>.
*/
?>
    <?php foreach ($comments as $comment): ?>
<?php $rnd = rand();?>
    <a name="c<?=$comment['Comment']['id'];?>">
    <?php if ($comment['Comment']['inout'] == 0): ?>
       <dl id="c-out" class="grid_8 push_4 alpha omega comment">
	  <?php else: ?>
	  <dl id="c-in" class="grid_8 alpha omega comment">
	     <?php endif;?>    
    <dt>
    <div style="float:right;">   
    <?=$this->element('userpad',array('user'=>$comment['User']));?>,
    <div style="text-align:right;">
    <?=$html->link(count($comment['children']).' replies',
		   '#'.$comment['Comment']['id'],
		   array('onclick' => 'Element.toggle("r'.$comment['Comment']['id'].'");',
			 'style' => 'vertical-align:baseline;font-size:x-small;'));?>
    <?=$html->link('',
		   '#'.$comment['Comment']['id'],
		   array('class' => 'reply',
			 'onclick' => 'Element.toggle("f'.$comment['Comment']['id'].'");')
		   );?>
    <?=$html->link('','',
		   array('class' => 'flag')
		   );?>
    </div></div>
    <div>
    <?=$comment['Comment']['comment']?>
    </div>
    </dt>
    <?=$form->create('Comment',
		     array('controller' => 'comments',
			   'style' => 'display:none;',
			   'id' => 'f'.$comment['Comment']['id'],
			   'action' => 'reply', 
			   $comment['Comment']['id']));?>
    <?=$form->textarea('comment',array('rows' => '2'));?>
    <?=$form->hidden('user_id',array('value' => $session->read('User.id')));?>
    <?=$form->hidden('inout',array('value' => '-1'));?>
    <?=$form->hidden('post_id',array('value' => $comment['Comment']['post_id']));?>
    <?=$form->hidden('parent_id',array('value' => $comment['Comment']['id']));?>
    <?=$ajax->submit('Reply',array('url' => array('controller' => 'comments', 'action' => 'reply'), 'update' => 'c'.$comment['Comment']['id']));?>
    <?=$form->end();?>
    <ul class="grid_7 push_1 alpha omega reply" id="r<?=$comment['Comment']['id'];?>" style="display:none">
    <?php foreach ($comment['children'] as $reply): ?>
    <li><?=$reply['Comment']['comment']?> &ndash; <?=$html->link($reply['User']['nama'],array('controller'=>'users','action'=>'view',$reply['User']['id']))?></li>
    <?php endforeach; ?>
    </ul>   
    </dl>
    <?php endforeach; ?>
