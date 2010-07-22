<h2><?php echo $html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])); ?></h2>
<hr/>
	<!-- embed media -->
	<?php echo $post['Post']['url']; ?>
<br/>
	<?php echo $post['Post']['teaser']; ?>
</div>
<div class="clear">&nbsp;</div>
	<ul>
		<li><?php echo $html->link('Edit Post', array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $html->link('Delete Post', array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete Post #%s?', true), $post['Post']['id'])); ?> </li>
	</ul>
