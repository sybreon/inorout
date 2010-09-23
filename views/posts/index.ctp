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

<div class="intro">
<p id="intro">
	What if you could speak up? 
	<br>
	Without fear of prosecution, but with courage and concern?
	<br>
	What if we were not just nice men and women, but great citizens as well?
	<br>
	What if conversations were driven, not by politicians alone, but by us? 
	<br?
	People who believe the right to think is the beginning of freedom.
	<br>
	IN/OUT is a platform that empowers you to lead a conversation and shape the way you think about the issues that matter in Malaysia. 
	<br>
</p>
</div>

<div class="grid_6 alpha">
<?php
/*
For lightbox, Image's instruction
*/

$javascript->link('prototype.js', false);
$javascript->link('scriptaculous.js?load=effects,builder', false);
$javascript->link('lightbox.js', false);


echo $html->css(array('lightbox'), 'stylesheet', array('media' => 'screen'));

echo $html->link('How does this work?',
			//$html->image("help/instruction_00.gif", array("alt" => "image #0", "title" =>"image #0", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_00.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]', 
			'title' => 'Welcome to The Ultimate IN/OUT Know-How! This guide will briefly tell you what you can in this site')
		);
		
		echo $html->link('',
			//$html->image("help/instruction_01.gif", array("alt" => "image #1", "title" =>"image #1", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_01.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'You can first read the posts available on both IN and OUT.')
		);
		
		echo $html->link( '',
			//$html->image("help/instruction_02.gif", array("alt" => "image #2", "title" =>"image #2", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_02.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Then, choose your side. Do you agree to the post?' )
		);
		
		echo $html->link('',
			//$html->image("help/instruction_03.gif", array("alt" => "image #3", "title" =>"image #3", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_03.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'If you do, you are IN. If you do not, you are OUT.' )
		);
		
		echo $html->link('',
			//$html->image("help/instruction_04.gif", array("alt" => "image #4", "title" =>"image #4", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_04.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Make a decision! You can either vote IN or vote OUT by clicking. But remember, you can only vote once!' )
		);
		
		//echo '<br>';
		
		echo $html->link('',
			//$html->image("help/instruction_05.gif", array("alt" => "image #5", "title" =>"image #5", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_05.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'After voting, you may elaborate your point through comments. Despite your one vote, you can comment on either side 
						of IN and OUT, you can also reply to other comments.' )
		);
		
		echo $html->link('',
			//$html->image("help/instruction_06.gif", array("alt" => "image #6", "title" =>"image #6", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_06.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'So, are you IN/OUT?' )
		);
		
		echo $html->link('',
			//$html->image("help/instruction_07.gif", array("alt" => "image #7", "title" =>"image #7", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_07.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Vote wisely! Because your vote will influence the position of the post.' )
		);
		
		
		
		echo $html->link('',
			//$html->image("help/instruction_08.gif", array("alt" => "image #8", "title" =>"image #8", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_08.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'If IN votes surpass OUT votes, the post will be placed under IN.' )
		);
		
		
		
		echo $html->link('',
			//$html->image("help/instruction_04.gif", array("alt" => "image #9", "title" =>"image #9", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_09.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => '...and vice versa.' )
		);
		
		
		//echo '<br>';
		
		echo $html->link('',
			//$html->image("help/instruction_10.gif", array("alt" => "image #10", "title" =>"image #10", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_10.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'If IN votes and OUT votes are equal, the post will appear on both sides.' )
		);
		
		echo $html->link('',
			//$html->image("help/instruction_11.gif", array("alt" => "image #11", "title" =>"image #11", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_11.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'You do not have to register. Just login with your existing Google, Yahoo or myOpenID account.' )
		);
		
		echo $html->link('',
			//$html->image("help/instruction_12.gif", array("alt" => "image #12", "title" =>"image #12", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_12.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'And you can start to participate: vote, comment or add in your own post!' )
		);
		
		echo $html->link('',
			//$html->image("help/instruction_13.gif", array("alt" => "image #13", "title" =>"image #13", "width"=>"40", "height"=>"40")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_13.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Think. Talk. Vote. This site hopes to provide a platform for Malaysians to share their ideas, discuss 
						about issues and be a voter that is responsible to his/her choice.'
						)
			
		);
?>


</ul>

    </div>
    <ul class="grid_6 omega sort hmenu" id="sort">sort by:&nbsp;
    <li class="first"><?=$paginator->sort('Date','id');?></li>
    <li><?=$paginator->sort('Ins','vins');?></li>
    <li><?=$paginator->sort('Outs','vouts');?></li>
    <li><?=$paginator->sort('Views','views');?></li>
    </ul>   
    <dl class="grid_6 alpha post" id="p-in">
    <?=$html->image('IN.png');?>
<? foreach ($posts_in as $post): ?>
<dt>
<? echo $this->element('scorepad',array('post' => $post)); ?>
<p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
<p class="teaser"><?=$text->truncate($text->stripLinks($post['Post']['teaser']),128); ?></p>
</dt>
<dd>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  <span class="comments"><?=$post['Post']['cins'] + $post['Post']['couts']?>&nbsp;comments</span>
  </dd>
  <?php endforeach; ?>
  </dl>

<dl class="grid_6 omega post" id="p-out">
  <?=$html->image('OUT.png');?>
  <?php foreach ($posts_out as $post): ?>
  <dt>
   <?php echo $this->element('scorepad',array('post' => $post)); ?>
  <p class="title"><?=$html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></p>
  <p class="teaser"><?=Sanitize::html($text->truncate($post['Post']['teaser'],128));?></p>
  </dt>
  <dd>
  <?=$time->niceShort($post['Post']['created']);?> &ndash; <?=$html->link($post['User']['nama'],array('controller'=>'users','action'=>'view',$post['User']['id']));?>
  <span class="comments"><?=$post['Post']['cins'] + $post['Post']['couts']?>&nbsp;comments</span>
  </dd>
  <?php endforeach; ?>
  </dl>

<div class="clear">&nbsp;</div>
<div class="grid_5 alpha"><?=$paginator->prev('&laquo Previous',array('escape' => false));?>&nbsp;</div>
<div class="grid_2" style="text-align:center"><?=$paginator->counter();?></div>
<div class="grid_5 omega" style="text-align:right">&nbsp;<?=$paginator->next('Next &raquo',array('escape' => false));?></div>
<div class="clear">&nbsp;</div>
<div class="grid_12 alpha omega">
<?=$html->image('add-post.png',
		array('alt' => 'Add a Post',
		      'url' => array('controller' => 'posts',
				     'action' => 'add')
		      )
		);?>&nbsp;
</div>
<div class="clear">&nbsp;</div>
