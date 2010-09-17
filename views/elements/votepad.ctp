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
<?php $log = $session->check('User.id'); ?>
<?=$html->image('vote_bar.png');?>
Are you IN or OUT for this issue? (you can only vote once)
  <br/>
<?php if (isset($vote['Vote']['vote'])): ?>
			     <?=$html->link($html->image('voteIN.png'),
					    '#voted',	      
					    array('class' => ($vote['Vote']['vote'] == 1) ? 'balloted' : 'ballotx',
						  'escape' => false)
					    );?>
<?=$html->link($html->image('voteOUT.png'),
	       '#voted',	      
	       array('class' => ($vote['Vote']['vote'] == 0) ? 'balloted' : 'ballotx',
		     'escape' => false)
	       );?>
<? elseif($session->check('User.id')): ?>
<?=$ajax->link($html->image('voteIN.png'),
	       array('controller' => 'votes',
		     'action' => 'vin', $post['Post']['id']),
	       array('update' => 'vote',
		     'escape' => false,
		     'class' => 'ballot'),			 
	       'Do you want to vote IN?');?>
<?=$ajax->link($html->image('voteOUT.png'),
	       array('controller' => 'votes',
		     'action' => 'vout', $post['Post']['id']),
	       array('update' => 'vote',
		     'escape' => false,
		     'class' => 'ballot'),
	       'Do you want to vote OUT?');?>	  
<?php else: ?>
	<?=$html->link($html->image('voteIN.png'),
		       array('controller' => 'votes',
			     'action' => 'vin', $post['Post']['id']),	      
		       array('escape' => false,
			     'class' => 'ballot'));?>
<?=$html->link($html->image('voteOUT.png'),
	       array('controller' => 'votes',
		     'action' => 'vout', $post['Post']['id']),	      
	       array('escape' => false,
		     'class' => 'ballot'));?>	  
<?php endif; ?>

