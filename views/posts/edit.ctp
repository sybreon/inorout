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
<?php print($form->create('Post',array('action' => 'edit')));?>
<fieldset>
<legend><?php echo $this->pageTitle; ?></legend>
<?php 
echo $form->input('title');
echo $form->input('url', array('maxLength' => '2048')); // IE practical limit
echo $form->input('teaser',array('rows'=>'9'));
?>
</fieldset>
<?php print($form->end('Save'));?>
<div id="typediv">&nbsp;</div>
<?php
// echo $ajax->observeField( 'PostUrl', array('url' => array('action' => 'bitly')));
?>