<?php

class ProductPackage extends \Eloquent {
	protected $table = 'product_packages';
	protected $fillable = [
		'category_id',
		'order',
		'width',
		'height',
		'price',
	];
	public function category(){
		return $this->hasOne('ProductCategory','id', 'category_id');
	}
}