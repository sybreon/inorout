<div class="posts index">
<div class="ins" style="width:50%;">
<?php foreach ($ins as $post) { ?>
<div>
	<span class="title">
	<?php 
	      print($post['Post']['ins']); 
	      print($post['Post']['views']); 
	      print($post['Post']['outs']); 
	?>
	</span>
	<span class="teaser">
	<?php
		print($html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])));
		// print('<p aligh="left">' . $post['Post']['teaser'] . '</p>');
	?>
	</span>
</div>
<?php	} ?>
</div>
<div class="outs" style="">
<?php foreach ($outs as $post) { ?>
<div>
	<span class="title">
	<?php 
	      print($post['Post']['ins']); 
	      print($post['Post']['views']); 
	      print($post['Post']['outs']); 
	?>
	</span>
	<span class="teaser">
	<?php
		print($html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])));
		// print('<p aligh="left">' . $post['Post']['teaser'] . '</p>');
	?>
	</span>
</div>
<?php	} ?>
</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Add Post', array('action' => 'add'));?></li>
	</ul>
</div>
