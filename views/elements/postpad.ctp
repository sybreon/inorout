<?php
/*
 INOROUT - Social Discussion Platform
 Copyright (C) 2010 Shawn Tan <shawn.tan@sybreon.com>
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as
 published by the Free Software Foundation, either version 3 of the
 License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 Affero General Public License for more details.
   
 You should have received a copy of the GNU Affero General Public
 License along with this program.  If not, see
 <http://www.gnu.org/licenses/>.
*/
?>
<?php $del = ($post['Post']['flags'] < 0) ? 'del' : 'reg'; ?>
<?=$html->link('&laquo; return to main page',
		      array('controller' => 'posts',
			    'action' => 'index'),array('escape'=>false));?>
<?=$html->tag('h4',
	      $post['Post']['title'],
	      array('class' => $del)
	      );?>
<div class="url">
    <div id="thumb"><?=$html->link($html->image('http://api.thumbalizr.com/?width=128&api_key=c61f2fe6c4ebe609c650bcfa6dcab244&url='.urlencode($post['bitly'])),
				   $post['Post']['url'],
				   array('escape' => false));?></div>
    <div id="meta">
    <?=$html->link($text->truncate($post['bitly'],
				   64). ' &raquo;', 
		   $post['Post']['url'],
		   array('escape'=>false,
			 'class' => $del)
		   );?>
    </div>
    <div class="clear">&nbsp;</div>
</div>
<?=$html->tag('p', 
	      Sanitize::html($post['Post']['teaser'], true),
	      array('class' => $del)
	      );?>

<ul class="grid_8 alpha omega" id="pact">
    <?php if ($session->check('User.id')): ?>
   <?php if (isset($flag['Flag']['flag'])): ?>
       <li><?=$html->link('','#',array('class' => 'flagged')); ?></li>
       <?php else: ?>
   <li><?=$ajax->link('',//$post['Post']['flags'],
		     array('controller' => 'votes',
			   'action' => 'flag', $post['Post']['id']),
		     array('update' => 'post',
			   'escape' => false,
			   'title' => 'flag',
			   'class' => 'flag')
		     );?></li>	    
		     <?php endif; ?>
		     <?php if($post['Post']['user_id'] == $session->read('User.id')): ?>
   <li><?=$html->link('',
		     array('controller' => 'posts',
			   'action' => 'edit', $post['Post']['id']),
		     array(//'update' => 'vote',
			   'escape' => false,
			   'title' => 'edit',
			   'class' => 'edit')
		     );?></li>
		     <?php if($post['Post']['flags'] >= 0): ?>
  <li><?=$ajax->link('',
		     array('controller' => 'posts',
			   'action' => 'delete', $post['Post']['id']),
		     array('update' => 'post',
			   'escape' => false,
			   'title' => 'delete',
			   'class' => 'del'),
		     'Do you want to delete post #'.$post['Post']['id'].'?'
		     );?></li>			      
			      <?php endif;?>
			      <?php endif;?>
			      <?php endif;?>

  <li><?=$html->link('',
		     'http://twitter.com/share?url='.urlencode(Router::url('',true)).'&text='.urlencode($post['Post']['title']),
		     array('update' => 'vote',
			   'escape' => false,
			   'target' => '_blank',
			   'title' => 'share on twitter',
			   'class' => 'twit')
		     );?></li>
  <li><?=$html->link('',
		     'http://www.facebook.com/sharer.php?u='.urlencode(Router::url('',true)).'&t='.urlencode($post['Post']['title']),
		     array('update' => 'vote',
			   'escape' => false,
			   'target' => '_blank',
			   'title' => 'share on facebook',
			   'class' => 'fb')
		     );?></li>
</ul>
