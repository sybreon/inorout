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
<div class="grid_8 alpha" id="post">
    <?=$this->element('postpad');?>
</div><!--post-->

<div class="grid_4 omega" id="stat">
    <?=$this->element('statpad');?>
</div><!--stat-->
<div class="clear">&nbsp;</div>

<div class="grid_12 alpha omega" id="vote">
  <?=$this->element('votepad');?>
</div>
<div class="clear">&nbsp;</div>

<div class="grid_12 alpha omega" id="comm">
    <?=$html->image('comment_bar.png');?>
<p>&nbsp;</p>
    <?=$this->element('commpad');?>
</div>
<div class="clear">&nbsp;</div>

<div class="grid_12 alpha omega">
<br/>
<?php
for ($i=0;$i<2;$i++) {
  $pad = ($i == 0) ? 'alpha' : 'omega';
  $inout = ($i == 0) ? 1 : 0;
  echo '<div id="fcomm'. $inout .'" class="grid_6 form fcomm '. $pad .'">';
  echo $form->create('Comment', array('controller' => 'comments', 'action' => 'add'));
  echo '<fieldset>';
  //echo '<legend>Add Comment</legend>';
  //echo $form->input('comment',array('rows'=>'9'));
  echo '<label>Have your say:&nbsp;</label>';
  echo $form->textarea('comment',array('rows'=>'4'));
  //echo $form->radio('inout',array('1' => 'In', '0' => 'Out'), array('separator' => '', 'legend' => false));
  echo '</fieldset>';
  echo $form->hidden('id', array('value' => $post['Post']['id']));
  echo $form->hidden('inout', array('value' => $inout));
  echo $form->submit('add-comment.png',array('class' => 'fcomm'));
  echo $form->end();
  echo '</div>';
 }
?>
</div>
<div class="clear">&nbsp;</div>


