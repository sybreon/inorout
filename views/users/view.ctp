<div class="grid_2 alpha">
<?=$html->image('http://www.gravatar.com/avatar/'. $user['User']['mail'] .'?d=wavatar&r=pg&s=128',
		array('alt' => $user['User']['nama'],
		      'style' => 'float:left;margin-right:8px;',
		      'url' => array('controller' => 'users',
				     'action' => 'view',
				     $user['User']['id']
				     )
		      )
		);?>
<p>Score &mdash; <?=$user['User']['vins'] + $user['User']['vouts']?></p>
</div>
<div class="grid_4">
   <p>Nickname<br/><?=$user['User']['nama']?></p>
   <p>Member since<br/><?=$time->niceShort($user['User']['created'])?></p>
   <p>Last login<br/><?=$time->niceShort($user['User']['modified'])?></p>
</div>
<div class="grid_6 omega">
   &nbsp;
</div>
<div class="clear">&nbsp;</div>

<ul class="grid_6 alpha"><h3>Posts (<?=count($user['Post'])?>)</h3>
   <?php foreach($user['Post'] as $post): ?>
   <li><?=$html->link($text->truncate($post['title'],64),
		      array('controller'=>'posts',
			    'action'=>'view',
			    $post['id']));?>
   <?php endforeach;?>
</ul>

<ul class="grid_6 omega"><h3>Comments (<?=count($user['Comment'])?>)</h3>
   <?php foreach($user['Comment'] as $comm): ?>
   <li><?=$html->link($text->truncate($comm['comment'],64),
		      array('controller'=>'posts',
			    'action'=>'view',
			    $comm['post_id'].'#c'.$comm['id']));?>
   <?php endforeach;?>
</ul>

<div class="clear">&nbsp;</div>
