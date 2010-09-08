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
<h2>Users</h2>

<ul class="grid_12 alpha omega" id="users">
   <? foreach ($users as $user): ?>
   <span><?=$this->element('userpad',array('date' => $user['User'],'user' => $user['User']));?></span>
   <? endforeach;?>
</ul>

<pre><? ?></pre>