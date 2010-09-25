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
<?php
/* For lightbox, Image's instruction. */
$javascript->link('prototype.js', false);
$javascript->link('scriptaculous.js?load=effects,builder', false);
echo $javascript->codeBlock('var webRoot = "'.$this->webroot.'";');
echo $javascript->link('lightbox.js', true);
echo $html->css(array('lightbox'), 'stylesheet', array('media' => 'screen'));
?>
<p class="grid_6 alpha" id="help">
<a href="<?=$this->webroot;?>img/help/instruction_00.gif" rel="lightbox[help]" title="Welcome to The Ultimate IN/OUT Know-How! This guide will briefly tell you what you can in this site.">How does this work?</a>
<a href="<?=$this->webroot;?>img/help/instruction_01.gif" rel="lightbox[help]" title="You can first read the posts available on both IN and OUT."></a>
<a href="<?=$this->webroot;?>img/help/instruction_02.gif" rel="lightbox[help]" title="Then, choose your side. Do you agree to the post?"></a>
<a href="<?=$this->webroot;?>img/help/instruction_03.gif" rel="lightbox[help]" title="If you do, you are IN. If you do not, you are OUT."></a>
<a href="<?=$this->webroot;?>img/help/instruction_04.gif" rel="lightbox[help]" title="Make a decision! You can either vote IN or vote OUT by clicking. But remember, you can only vote once!"></a>
<a href="<?=$this->webroot;?>img/help/instruction_05.gif" rel="lightbox[help]" title="After voting, you may elaborate your point through comments. Despite your one vote, you can comment on either side of IN and OUT, you can also reply to other comments."></a>
<a href="<?=$this->webroot;?>img/help/instruction_06.gif" rel="lightbox[help]" title="So, are you IN/OUT?"></a>
<a href="<?=$this->webroot;?>img/help/instruction_07.gif" rel="lightbox[help]" title="Vote wisely! Because your vote will influence the position of the post."></a>
<a href="<?=$this->webroot;?>img/help/instruction_08.gif" rel="lightbox[help]" title="If IN votes surpass OUT votes, the post will be placed under IN."></a>
<a href="<?=$this->webroot;?>img/help/instruction_09.gif" rel="lightbox[help]" title="...and vice versa."></a>
<a href="<?=$this->webroot;?>img/help/instruction_10.gif" rel="lightbox[help]" title="If IN votes and OUT votes are equal, the post will appear on both sides."></a>
<a href="<?=$this->webroot;?>img/help/instruction_11.gif" rel="lightbox[help]" title="You do not have to register. Just login with your existing Google, Yahoo or myOpenID account."></a>
<a href="<?=$this->webroot;?>img/help/instruction_12.gif" rel="lightbox[help]" title="And you can start to participate: vote, comment or add in your own post!"></a>
<a href="<?=$this->webroot;?>img/help/instruction_13.gif" rel="lightbox[help]" title="Think. Talk. Vote. This site hopes to provide a platform for Malaysians to share their ideas, discuss about issues and be a voter that is responsible to his/her choice."></a>
</p>
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
