<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class PaymentMethod extends \Eloquent {
	use SoftDeletingTrait;

	protected $table = 'payment_methods';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'slug',
		'name',
		'image'
	];

	public static function getIdBySlug($slug){
		return PaymentMethod::where('slug', $slug)->first()->id;
	}
}