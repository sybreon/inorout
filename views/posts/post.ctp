<h2><?php 
$strike = $post['Post']['flags'] & 0x01;
if ($strike == 1) { echo '<strike>'; }
echo $html->link($post['Post']['title'], array('action' => 'post', $post['Post']['id'])); 
?></h2>
<hr/>
<!-- embed preview -->
<?php echo $html->image('link.png', array('alt' => 'hyperlink', 'url' => $post['Post']['url'])); ?>
<?php echo $html->para('teaser', $post['Post']['teaser']); ?>
</strike>
</div>
<div class="clear">&nbsp;</div>
<ul>
	<li><?php echo $html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?> </li>	
	<li><?php echo $html->link('Delete', array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete Post #%s?', true), $post['Post']['id']));?> </li>
</ul>

<pre>
<?php print_r($post); ?>
</pre>