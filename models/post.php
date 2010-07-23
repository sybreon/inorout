<?php
class Post extends AppModel {

	var $name = 'Post';
	var $validate = array(
			      'url'=>array(
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
					     'rule'=>array('maxLength',128),
					     'required'=>true,
					     'message'=>'Title must be shorter than 128 characters.'
					     ),
			      );
}
?>