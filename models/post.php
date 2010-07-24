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

class Post extends AppModel {

	var $name = 'Post';
	/*
	var $hasMany = array('Comment' => array('className' => 'Comment',
						//'conditions' => array('Comment.inout' => '0'),
						'order' => 'Comment.inout',
						),			     
			     'CommentOut' => array('className' => 'Comment',
						   'conditions' => array('Comment.inout' => '1'),
						   'order' => 'Comment.created DESC',
						   ),			    
			     );
	*/	
	var $hasMany = 'Comment';
	var $validate = array('url'=>array(
					   'rule'=>'url',
					   'required'=>false,
					   'allowEmpty'=>true,
					   'message'=>'Must be a valid url to an online resource.',
					   ),
			      'teaser'=>array(
					      'rule'=>array('minLength',32),
					      'required'=>true,
					      'message'=>'Teaser must be longer than 32 characters.'
					      ),
			      'title'=>array(
					     'rule'=>array('minLength',16),
					     'required'=>true,
					     'message'=>'Title must be longer than 16 characters.'
					     ),
			      );       
}
?>