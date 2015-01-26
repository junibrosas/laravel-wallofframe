<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class ProductFrame extends \Eloquent {
	use SoftDeletingTrait;
	protected $table = 'product_frames';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'name',
		'slug',
		'image'
	];
}