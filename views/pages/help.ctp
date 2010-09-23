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

<h2>In/Out Instructions</h2>

<?php
/*
For lightbox, Image's instruction
*/

$javascript->link('prototype.js', false);
$javascript->link('scriptaculous.js?load=effects,builder', false);
$javascript->link('lightbox.js', false);


echo $html->css(array('lightbox'), 'stylesheet', array('media' => 'screen'));


echo $html->link(
			$html->image("help/instruction_00.gif", array("alt" => "image #0", "title" =>"image #0", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_00.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]', 
			'title' => 'Welcome to The Ultimate IN/OUT Know-How! This guide will briefly tell you what you can in this site'
			)
		); 
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_01.gif", array("alt" => "image #1", "title" =>"image #1", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_01.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'You can first read the posts available on both IN and OUT.')
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_02.gif", array("alt" => "image #2", "title" =>"image #2", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_02.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Then, choose your side. Do you agree to the post?' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_03.gif", array("alt" => "image #3", "title" =>"image #3", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_03.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'If you do, you are IN. If you do not, you are OUT.' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_04.gif", array("alt" => "image #4", "title" =>"image #4", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_04.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Make a decision! You can either vote IN or vote OUT by clicking. But remember, you can only vote once!' )
		);
		
		//echo '<br>';
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_05.gif", array("alt" => "image #5", "title" =>"image #5", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_05.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'After voting, you may elaborate your point through comments. Despite your one vote, you can comment on either side 
						of IN and OUT, you can also reply to other comments.' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_06.gif", array("alt" => "image #6", "title" =>"image #6", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_06.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'So, are you IN/OUT?' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_07.gif", array("alt" => "image #7", "title" =>"image #7", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_07.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Vote wisely! Because your vote will influence the position of the post.' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_08.gif", array("alt" => "image #8", "title" =>"image #8", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_08.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'If IN votes surpass OUT votes, the post will be placed under IN.' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_04.gif", array("alt" => "image #9", "title" =>"image #9", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_09.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => '...and vice versa.' )
		);
		
		echo "&nbsp";
		//echo '<br>';
		
		echo $html->link(
			$html->image("help/instruction_10.gif", array("alt" => "image #10", "title" =>"image #10", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_10.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'If IN votes and OUT votes are equal, the post will appear on both sides.' )
		);
		
		echo "&nbsp";
		echo $html->link(
			$html->image("help/instruction_11.gif", array("alt" => "image #11", "title" =>"image #11", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_11.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'You do not have to register. Just login with your existing Google, Yahoo or myOpenID account.' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_12.gif", array("alt" => "image #12", "title" =>"image #12", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_12.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'And you can start to participate: vote, comment or add in your own post!' )
		);
		
		echo "&nbsp";
		
		echo $html->link(
			$html->image("help/instruction_13.gif", array("alt" => "image #13", "title" =>"image #13", "width"=>"60", "height"=>"60")),
			FULL_BASE_URL . '/cakephp/inorout/webroot/img/help/instruction_13.gif',
			array('escape'=>false, 'rel' => 'lightbox[help]',
			'title' => 'Think. Talk. Vote. This site hopes to provide a platform for Malaysians to share their ideas, discuss 
						about issues and be a voter that is responsible to his/her choice.'
						)
			
		);
?>

<br>

<style>
dl#faq dt { font-weight:bold;background:#e12;color:#fff;padding:4px 8px;margin-bottom:4px; }
dl#faq dt a { color:#fff; }
dl#faq dd { background:none;color:#333;padding:4px 8px; }
</style>
<?php echo $javascript->link('prototype'); ?> 
<br>
<dl id="faq">
    <dt><?=$html->link('A. How do I add a post?','#',array('onclick' => 'Element.toggle("faq01");'));?></dt>
<dd id="faq01" style="display:none">
<ol>
<li>Click the '+Add Post' button at bottom of page.</li>
<li>Enter a header for your post. It needs to contain more than 16 characters. To help boost views of the post, your header should be a clear statement that people can understand in one reading. </li>
<li>Enter a URL to direct readers to an online resource that will help them understand the story/issue better.</li>
<li>Enter a teaser summary. It needs to contain more than 32 characters.</li>
<li>Press 'Save'.</li>
<li>Your post will initially appear on both columns, because the vote tally is the same. The post will be placed in the IN or OUT column according to its votes.</li>
</ol>
</dd>
    
	
<dt><?=$html->link('B. How do I vote on a post?','#',array('onclick' => 'Element.toggle("faq02");'));?></dt>
<dd id="faq02" style="display:none"><p>
<ol>
<li>Click on the post header.</li>
<li>Go the section marked 'Vote' on the page, and click on either the IN or OUT box as per your vote.</li>
<li>If you refresh the page, your vote will be added to the IN or OUT tally.</li>

</ol>
</dd>
    <dt><?=$html->link('C. How do I comment on a post?','#',array('onclick' => 'Element.toggle("faq03");'));?></dt>
<dd id="faq03" style="display:none">
<ol>
<li>Click on the post header.</li>
<li>Scroll to 'Comment section' and enter your comment.</li>
<li>Press the 'Add comment button'. You'll need to be logged in first before you can post a comment. </li>
</ol>
</dd>

    <dt><?=$html->link('D. How do I flag a post that is not relevant to the site or is harmful?','#',array('onclick' => 'Element.toggle("faq04");'));?></dt>
<dd id="faq04" style="display:none">
<ol>
<li>Click on the post header.</li>
<li>Click on the 'Flag' image button at bottom of teaser summary.</li>
</ol>




</dd>
    <dt><?=$html->link('F. How do I share this post with others on Twitter or Facebook?','#',array('onclick' => 'Element.toggle("faq05");'));?></dt>
<dd id="faq05" style="display:none;">
<ol>
<li>Click on the post header.</li>
<li>Click on the Facebook or Twitter icon at bottom of teaser summary.</li>
</ol>
</dd>
</dl>









 



