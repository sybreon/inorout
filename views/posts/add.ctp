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

echo '<div id="f-post" class="grid_8 alpha_omega">';
echo $form->create('Post',array('action' => 'add'));
echo '<fieldset><legend>Add Post</legend>'; 
echo $form->hidden('user_id');
echo $form->input('title');
echo $form->input('url', array('maxLength' => '2048')); // IE practical limit
echo $form->input('teaser',array('rows'=>'9'));
echo '</fieldset>';
echo $form->end('Save');
echo $html->tag('em','Please refrain from making racist, sexist or derogatory statements in your post.<br/>Note that such posts will be flagged and removed.');
echo '</div>';
// echo $ajax->observeField( 'PostUrl', array('url' => array('action' => 'bitly')));
?>