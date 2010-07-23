<div class="grid_8">
<?php print($form->create('Post',array('action' => 'edit')));?>
<fieldset>
<?php 
print($form->input('title'));
print($form->input('url'));
print($form->input('teaser',array('rows'=>'5')));
?>
</fieldset>
<?php print($form->end('Save Post'));?>
</div>
<div class="grid_4">
	<ul>
		<li><?php echo $html->link('Delete', array('action' => 'delete', $form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Post.id'))); ?></li>
		<li><?php echo $html->link('Read', array('action' => 'post', $form->value('Post.id'))); ?></li>
		<li><?php echo $html->link('List', array('action' => 'index'));?></li>
	</ul>
</div>
