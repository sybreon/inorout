<?php
  /**
   INOROUT - Social Discussion Platform.
   Copyright (C) 2010 Shawn Tan <shawn.tan@sybreon.com>
 
   This program is free software: you can redistribute it and/or
   modify it under the terms of the GNU Affero General Public License
   as published by the Free Software Foundation, either version 3 of
   the License, or (at your option) any later version.
 
   This program is distributed in the hope that it will be useful, but
   WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
   Affero General Public License for more details.
   
   You should have received a copy of the GNU Affero General Public
   License along with this program.  If not, see
   <http://www.gnu.org/licenses/>.
  */
?>
<?php echo $javascript->link('prototype'); ?> 
<h4><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></h4>
<hr/>
<div id="vote" class="grid_1 alpha">
    <?=$this->element('votepad',
		      array('vout'=>array('controller'=>'posts','action'=>'vout',$post['Post']['id']),
			    'vin'=>array('controller'=>'posts','action'=>'vin',$post['Post']['id']),
			    ));?>
<!--<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><br/>
<a name="fb_share" type="box_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>-->
</div>
<div id="post" class="grid_9">
    <?=$this->element('userpad',array('uid'=>$post['User']['id'],
				      'nama'=>$post['User']['nama'],
				      'mail'=>$post['User']['mail'],
				      'stamp'=>$post['Post']['created'],
				      ));?>
<!-- embed preview -->
<?=$html->tag('p', Sanitize::html($post['Post']['teaser'],true));?>
</div>
<div class="grid_2 omega">
    <?=$this->element('scorepad',array('ins'=>$post['Post']['ins'],'outs'=>$post['Post']['outs'],'views'=>$post['Post']['views']));?>
</div>
<div class="clear">&nbsp;</div>
<ul id="acts" class="grid_3 alpha">
    <li><?=($session->read('User.id') == $post['Post']['user_id']) ? $html->link('Edit', array('action' => 'edit', $post['Post']['id'])) : '&nbsp;';?></li>	  
    <li id="actflg"><?=($post['Post']['flags'] > 0) ? $ajax->link('Flag ('. $post['Post']['flags'] .')', array('controller' => 'posts', 'action' => 'flag', $post['Post']['id']), array('update' => 'actflg'), sprintf(__('Flag post #%s?', true), $post['Post']['id'])) : $ajax->link('Flag', array('controller' => 'posts', 'action' => 'flag', $post['Post']['id']), array('update' => 'actflg'), sprintf(__('Flag post #%s?', true), $post['Post']['id']));?></li>
    <li id="actdel"><?=($post['Post']['flags'] == -1) ? '<a href="#" class="disable">Deleted</a>' : $ajax->link('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('update' => 'actdel'), sprintf(__('Delete post #%s?', true), $post['Post']['id']));?></li>
    </ul>
    <div class="grid_5 omega">
    <a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
    <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    </div>
    <div class="clear">&nbsp;</div>
    <dl class="grid_12 alpha omega">
    <?php foreach ($post_comments as $comment): ?>
    <a name="c<?=$comment['Comment']['id']?>">
    <?php if ($comment['Comment']['inout'] == 0): ?>
				 <dl id="c-out" class="grid_10 push_2 alpha omega comment">
				    <?php else: ?>
				    <dl id="c-in" class="grid_10 alpha omega comment">
				       <?php endif;?>
    
    <dd>
    <?=$this->element('userpad',array('uid'=>$comment['User']['id'],
				      'nama'=>$comment['User']['nama'],
				      'mail'=>$comment['User']['mail'],
				      'stamp'=>$comment['Comment']['created'],
				      ));?>
    <?=$comment['Comment']['comment']?></dd>    
    <ul class="grid_9 push_1 alpha omega reply">
    <?php foreach ($comment['children'] as $reply): ?>
    <li><?=$reply['Comment']['comment']?> &ndash; <?=$html->link($reply['User']['nama'],array('controller'=>'users','action'=>'view',$reply['User']['id']))?></li>
    <?php endforeach; ?>
    </ul>   
    </dl>
    <?php endforeach; ?>
</dl>
<?php
for ($i=0;$i<2;$i++) {
  $pad = ($i == 0) ? 'alpha' : 'omega';
  $inout = ($i == 0) ? 1 : 0;
  echo '<div id="fcomm'. $inout .'" class="grid_6 form '. $pad .'">';
  echo $form->create('Comment', array('controller' => 'comments', 'action' => 'add'));
  echo '<fieldset>';
  echo '<legend>Add Comment</legend>';
  echo $form->input('comment',array('rows'=>'9'));
  //echo $form->radio('inout',array('1' => 'In', '0' => 'Out'), array('separator' => '', 'legend' => false));
  echo '</fieldset>';
  echo $form->hidden('id', array('value' => $post['Post']['id']));
  echo $form->hidden('inout', array('value' => $inout));
  echo $form->end('Save');
  echo '</div>';
 }
?>
  <div class="clear">&nbsp;</div>
<pre>
  <?php // print_r($post_comments); ?>
</pre>