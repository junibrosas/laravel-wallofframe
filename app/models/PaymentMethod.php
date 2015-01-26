<?php

class PaymentMethod extends \Eloquent {
	protected $table = 'payment_methods';
	protected $fillable = [
		'slug',
		'name',
		'image'
	];

	public static function getIdBySlug($slug){
		return PaymentMethod::where('slug', $slug)->first()->id;
	}
}