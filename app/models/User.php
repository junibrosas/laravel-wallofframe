<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Laracasts\Presenter\PresentableTrait;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface
{
	use ConfideUser;
	use PresentableTrait;
	use HasRole;

	protected $table = 'users';
	protected $presenter = 'Iboostme\User\UserPresenter';
	protected $hidden = array('password', 'remember_token');
	protected $fillable = ['username', 'email', 'photo', 'password', 'password_confirmation', 'confirmation_code'];

	public function country(){
		return $this->hasOne('Country', 'id', 'country_id');
	}

	public function profile(){
		return $this->hasOne('Profile', 'user_id', 'id');
	}

	public function images(){
		return $this->morphMany('Image', 'imageable');
	}

	public function shippingAddresses(){
		return $this->hasMany('ShippingAddress', 'user_id', 'id');
	}

	public function getProfile(){
		if( $this->profile ){
			return $this->profile;
		}
		return new Profile;
	}

	public function getCountry(){
		if( $this->country ){
			return $this->country;
		}
		return new Country;
	}

	public function isAdmin(){
		$type = UserType::find(Auth::user()->type_id);
		if($type->slug == 'admin'){
			return true;
		}
		return false;
	}
}
