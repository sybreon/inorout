<div class="posts view">
<h2><?php echo $html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])); ?></h2>
<hr/>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Teaser'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['teaser']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['url']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit Post', array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $html->link('Delete Post', array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete Post #%s?', true), $post['Post']['id'])); ?> </li>
	</ul>
</div>
