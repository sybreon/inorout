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
<div class="user">
    <?=$html->image('http://www.gravatar.com/avatar/'. $user['mail'] .'?d=wavatar&r=pg&s=36',
		    array('alt' => $user['nama'],
			  'style' => 'float:left;margin-right:8px;',
			  'url' => array('controller' => 'users',
					 'action' => 'view',
					 $user['id']
					 )
			  )
		    );?>
<?=$time->niceShort($date['created'])?><br/>
    <?=$html->link($user['nama'], array('controller' => 'users', 'action' => 'view', $user['id']));?>
</div>
    
