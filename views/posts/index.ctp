<div class="grid_6" id="ins">
<dl>
<?php foreach ($ins as $post) { ?>
	<dt>
	<?php
		$strike = $post['Post']['flags'] & 0x01;
		if ($strike == 1) { echo '<strike>'; }
		print($html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])));
	?>
	</strike>
	</dt>
	<dd>
	<?php 
	      print($post['Post']['ins']); 
	      print($post['Post']['views']); 
	      print($post['Post']['outs']); 
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
		print($html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])));
	?></strike>
	</dt>
	<dd>
	<?php 
	      print($post['Post']['ins']); 
	      print($post['Post']['views']); 
	      print($post['Post']['outs']); 
	?>
	</dd>
<?php	} ?>
</dl>
</div>

<div id="actions" class="grid_12">
	<ul>
		<li><?php echo $html->link('Add In/Out', array('action' => 'edit'));?></li>
	</ul>
</div>
