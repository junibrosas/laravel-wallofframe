<?php
class Profile extends \Eloquent {
	protected $table = 'profiles';

	protected $fillable = [
		'user_id',
		'first_name',
		'last_name',
		'mobile_number',
		'date_birth',
		'address',
		'uid',
		'access_token',
		'access_token_secret'
	];

	public function user(){
		return $this->hasOne('User', 'id', 'user_id');
	}

	public function getName(){
		return $this->first_name .' '.$this->last_name;
	}
}