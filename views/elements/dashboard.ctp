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

$id = ($session->check('User.id')) ? $session->read('User.id') : 0;
?>
<ul id="dashboard" class="hmenu dashboard grid_6 alpha">
    <?php if ($session->check('User.id')): ?>
   <li class="first"><?=$html->link($session->read('User.nama'),array('controller' => 'users', 'action' => 'view', $id))?></li>
      <li><?=$html->link('Logout',array('controller' => 'users', 'action' => 'logout', $id))?></li>
      <?php else: ?>
      <li class="first"><?=$html->link('Login',array('controller' => 'users', 'action' => 'login'))?></li>
	 <?php endif; ?>
<li><?=$html->link('FAQ',array('controller' => 'pages', 'action' => 'faq'))?></li>
<li><input type="text" value="search" style="margin:6px;border:1px solid #333;"></li>
</ul><ul class="grid_6 omega hmenu dashboard" id="sabm"><li class="first"><?=$html->link('Feedback','mailto:info@inorout.org');?></li><li><b><?=$html->link('Saya Anak Bangsa Malaysia','http://www.sayaanakbangsamalaysia.net');?></b></li></ul>
