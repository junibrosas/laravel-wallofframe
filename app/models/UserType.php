<?php

class UserType extends \Eloquent {
	protected $table = 'user_types';
	protected $fillable = [
		'name', 'slug', 'description'
	];
}