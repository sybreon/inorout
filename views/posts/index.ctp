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

<dl class="grid_6 alpha" id="p-in">
    <?php foreach ($posts_in as $post) { ?>
    <dt>
    <div class="meta">
 <div class="in"><p><?php echo $post['Post']['ins'];?></p></div>
 <div class="out"><p><?php echo $post['Post']['outs'];?></p></div>
 <div class="view"><p><?php echo $post['Post']['views'];?></p></div>

    </div>
    <div class="teaser">
					 <h3><?php echo $post['Post']['title'];?></h3>
					 <?php echo $text->truncate($text->stripLinks($post['Post']['teaser']),128); ?>
				       </div>
    </dt>
<?php } ?>
</dl>

<dl class="grid_6 omega" id="p-out">
<?php foreach ($posts_out as $post) { ?>
	<dt>
	<?php
		$strike = $post['Post']['flags'] & 0x01;
		if ($strike == 1) { echo '<strike>'; }
		print($html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])));
	?></strike>
	</dt>
	<dd>
	<?php 
	      echo $text->truncate($text->stripLinks($post['Post']['teaser']), 48);
	      echo $html->image('emoticon_smile.png') . $post['Post']['ins']; 
	      echo $html->image('eye.png') . $post['Post']['views']; 
	      echo $html->image('emoticon_unhappy.png') . $post['Post']['outs']; 
	?>
	</dd>
<?php	} ?>
</dl>
<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_3 alpha">
    <li><?php echo $html->link('Add Post', array('action' => 'add'));?></li>
</ul>
<div class="grid_9 omega">
<pre>
    <?php print_r($posts_in);?>
</pre>
</div>
