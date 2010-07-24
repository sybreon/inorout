<div class="grid_8">
<?php print($form->create('Post',array('action' => 'edit')));?>
<fieldset>
<legend><?php echo $this->pageTitle; ?></legend>
<?php 
echo $form->input('title');
echo $form->input('url');
echo $form->input('teaser',array('rows'=>'9'));
?>
</fieldset>
<?php print($form->end('Save'));?>
</div>
<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_12">
    <li><?php echo $html->link('Delete', array('action' => 'delete', $form->value('Post.id')), null, sprintf(__('Are you sure you want to delete In/Out #%s?', true), $form->value('Post.id'))); ?></li>
    <li><?php echo $html->link('Read', array('action' => 'post', $form->value('Post.id'))); ?></li>
</ul>

