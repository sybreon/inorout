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
<?=$html->image('vote_bar.png');?>
Are you IN or OUT? (you can only vote once)
  <br/>
<?=$ajax->link($html->image('voteIN.png'),
	       array('controller' => 'posts',
		     'action' => 'vin', $post['Post']['id']),
	       array('update' => 'vote',
		     'escape' => false,
		     'class' => 'ballot'),
	       'Do you want to vote IN?'
	       );?>
<?=$ajax->link($html->image('voteOUT.png'),
	       array('controller' => 'posts',
		     'action' => 'vout', $post['Post']['id']),
	       array('update' => 'vote',
		     'escape' => false,
		     'class' => 'ballot'),
	       'Do you want to vote OUT?'
	       );?>
