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
<div class="hr">
<p class="title">posted by</p>
    <?=$this->element('userpad',array('user' => $post['User'],'date' => $post['Post']));?>
</div>
<div class="hr">
   <div class="i28"><div class="total"><?=$html->image('vote.png',array('class'=>'img'));?>total</div><p class="numb"><?=$post['Post']['vins'] + $post['Post']['vouts'];?></p></div>
   <div class="i20">
    <?=$html->image('stat_IN.png');?><div class="b100"><div class="bin" style="width:<?=($post['Post']['vins']>0||$post['Post']['vouts']>0) ? $post['Post']['vins']*100/($post['Post']['vins']+$post['Post']['vouts']) : 0;?>%;"><?=($post['Post']['vins']>0)?$post['Post']['vins']:'&nbsp;';?></div></div>
   </div>
   <div class="i20">
    <?=$html->image('stat_OUT.png');?><div class="b100"><div class="bout" style="width:<?=($post['Post']['vins']>0||$post['Post']['vouts']>0) ? $post['Post']['vouts']*100/($post['Post']['vins']+$post['Post']['vouts']) : 0;?>%;"><?=($post['Post']['vouts']>0)?$post['Post']['vouts']:'&nbsp;';?></div></div>
   </div>
</div>
<div class="hr">
   <div class="i28"><div class="total"><?=$html->image('comment.png',array('class'=>'img'));?>total</div><p class="numb"><?=$post['Post']['cins']+$post['Post']['couts'];?></p></div>
   <div class="i20">
    <?=$html->image('stat_IN.png');?><div class="b100"><div class="bin" style="width:<?=($post['Post']['cins']>0||$post['Post']['couts']>0) ? $post['Post']['cins']*100/($post['Post']['cins']+$post['Post']['couts']) : 0;?>%;"><?=($post['Post']['cins']>0)?$post['Post']['cins']:'';?></div></div>
   </div>
   <div class="i20">
    <?=$html->image('stat_OUT.png');?><div class="b100"><div class="bout" style="width:<?=($post['Post']['cins']>0||$post['Post']['couts']>0) ? $post['Post']['couts']*100/($post['Post']['cins']+$post['Post']['couts']) : 0;?>%;"><?=($post['Post']['couts']>0)?$post['Post']['couts']:'';?></div></div>
   </div>
</div>
<div class="hr">
   <div class="i28"><div class="total"><?=$html->image('view.png',array('class'=>'img'));?>total</div><p class="numb"><?=$post['Post']['views']?></p></div>
</div>

