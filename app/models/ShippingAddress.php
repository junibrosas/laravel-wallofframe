<?php
use Laracasts\Presenter\PresentableTrait;

class ShippingAddress extends Model {
	use PresentableTrait;

	protected $table = 'shipping_addresses';
	protected $presenter = 'Iboostme\User\Customer\ShippingAddressPresenter';
	protected static $rules = array(
		'first_name' => 'required',
		'last_name' => 'required',
		'mobile_number' => 'required|numeric',
		'address' => 'required',
	);
	protected $fillable = [
		'user_id',
		'first_name',
		'last_name',
		'mobile_number',
		'address',
		'landmark'
	];
}