<h2><?php 
echo $html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])); 
?></h2>
<hr/>
<!-- embed preview -->
<small>Created: <?php echo $post['Post']['created']?></small>
<?php echo $html->image('link_go.png', array('alt' => 'hyperlink', 'url' => $post['Post']['url'])); ?>
<?php $strike = $post['Post']['flags'] & 0x01;
if ($strike == 1) { echo '<strike>'; }
?>
<?php echo $html->para('teaser', $post['Post']['teaser']); ?>
</strike>
</div>
<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_12">
	<li><?php echo $html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?> </li>	
	<li><?php echo $html->link('Delete', array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete In/Out #%s?', true), $post['Post']['id']));?> </li>
</ul>
