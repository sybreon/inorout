<div class="grid_6" id="ins">
<dl>
<?php foreach ($ins as $post) { ?>
	<dt>
	<?php
		$strike = $post['Post']['flags'] & 0x01;
		if ($strike == 1) { echo '<strike>'; }
		print($html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])));
	?>
	</strike>
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
</div>
<div class="grid_6" id="outs">
<dl>
<?php foreach ($outs as $post) { ?>
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
</div>

<ul id="acts" class="grid_12">
    <li><?php echo $html->link('Add In/Out', array('action' => 'edit'));?></li>
</ul>

