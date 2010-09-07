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
<div class="score">
<div class="in">
    <p><?=($post['Post']['vins']>0)?$post['Post']['vins']:'0';?></p>
</div>
<div class="out">
    <p><?=($post['Post']['vouts']>0)?$post['Post']['vouts']:'0';?></p>
</div>
<div class="view">
    <p><?=($post['Post']['views']>0)?$post['Post']['views']:'0';?></p>
</div>
</div>
    
