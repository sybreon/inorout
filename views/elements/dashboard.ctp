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

$id = ($session->check('User.id')) ? $session->check('User.id') : 0;
?>
<ul id="dashboard">
    <?php if ($session->check('User.id')): ?>
   <!--   <li><img src="http://www.gravatar.com/avatar/<?=$session->read('User.mail');?>?s=16&r=pg&d=mm" /></li> -->
	     <li><?=$html->link($session->read('User.nama'),array('controller' => 'users', 'action' => 'view', $id))?></li>
	     <li><?=$html->link('sign out',array('controller' => 'users', 'action' => 'logout', $id))?></li>
	     <?php else: ?>
	     <li><?=$html->link('sign in',array('controller' => 'users', 'action' => 'login'))?></li>
		<?php endif; ?>
</ul>