<div class="posts form">
<?php print($form->create('Post'));?>
<fieldset>
<?php 
print($form->input('title'));
print($form->input('url'));
print($form->input('teaser',array('rows'=>'5')));
?>
</fieldset>
<?php print($form->end('Save Post'));?>
</div>