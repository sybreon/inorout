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
   <li><?=$html->link($session->read('User.nama'),array('controller' => 'users', 'action' => 'view', $id))?></li>
      <li><?=$html->link('logout',array('controller' => 'users', 'action' => 'logout', $id))?></li>
      <?php else: ?>
      <li><?=$html->link('login',array('controller' => 'users', 'action' => 'login'))?></li>
	 <?php endif; ?>
<li><?=$html->link('about',array('controller' => 'pages', 'action' => 'about'))?></li>
<li><?=$html->link('faq',array('controller' => 'pages', 'action' => 'faq'))?></li>
<li><input type="text" value="search" style="margin:6px;border:1px solid #333;"></li>
</ul>