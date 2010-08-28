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
    <a name="c<?=$comment['Comment']['id']?>">
    <?php if ($comment['Comment']['inout'] == 0): ?>
				 <dl id="c-out" class="grid_8 push_4 alpha omega comment">
				    <?php else: ?>
				    <dl id="c-in" class="grid_8 alpha omega comment">
				       <?php endif;?>
    
    <dd>
    <?=$this->element('userpad',array('uid'=>$comment['User']['id'],
				      'nama'=>$comment['User']['nama'],
				      'mail'=>$comment['User']['mail'],
				      'stamp'=>$comment['Comment']['created'],
				      ));?>
    <?=$comment['Comment']['comment']?></dd>    
    <ul class="grid_7 push_1 alpha omega reply">
    <?php foreach ($comment['children'] as $reply): ?>
    <li><?=$reply['Comment']['comment']?> &ndash; <?=$html->link($reply['User']['nama'],array('controller'=>'users','action'=>'view',$reply['User']['id']))?></li>
    <?php endforeach; ?>
    </ul>   
    </dl>
    <?php endforeach; ?>