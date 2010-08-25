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
<?=$html->link('&laquo; return to main page',
		      array('controller' => 'posts',
			    'action' => 'index'),array('escape'=>false));?>
<h4><?=$post['Post']['title'];?></h4>
<div class="url">
  <?=$html->link($text->truncate($post['bitly'],
				 64). ' &raquo;', 
		 $post['Post']['url'],array('escape'=>false))?>
</div>
<?=$html->tag('p', Sanitize::html($post['Post']['teaser'],true));?>

<ul class="grid_6 alpha" id="acts">
  <li><?=$html->image('flag.png')?></li>
  <li><?=$html->image('edit.png')?></li>
  <li><?=$html->image('delete.png')?></li>
</ul>
<ul class="grid_2 omega" id="share">
  <li><?=$html->image('twitter.png')?></li>
  <li><?=$html->image('facebook.png')?></li>
</ul>
