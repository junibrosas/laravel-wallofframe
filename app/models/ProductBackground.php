<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class ProductBackground extends \Eloquent {
	use SoftDeletingTrait;
	protected $table = 'product_backgrounds';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'name',
		'slug',
		'image'
	];
	public function imagePath(){
		return asset('uploads/products/backgrounds/'.$this->image);
	}
}