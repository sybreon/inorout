<?=$html->link('&laquo; return to main page',
		      array('controller' => 'posts',
			    'action' => 'index'),array('escape'=>false));?>
<h4><?=$post['Post']['title'];?></h4>
<div class="url">
  <?=$html->link($text->truncate($post['bitly'],
				 64). ' &raquo;', 
		 $post['Post']['url'],array('escape'=>false))?>
</div>
<?=$html->tag('p', Sanitize::html($post['Post']['teaser'],true));?>

<ul class="grid_6 alpha" id="acts">
  <li><?=$html->image('flag.png')?></li>
  <li><?=$html->image('edit.png')?></li>
  <li><?=$html->image('delete.png')?></li>
</ul>
<ul class="grid_2 omega" id="share">
  <li><?=$html->image('twitter.png')?></li>
  <li><?=$html->image('facebook.png')?></li>
</ul>
