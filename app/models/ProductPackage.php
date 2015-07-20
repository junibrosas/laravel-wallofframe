<?php

class ProductPackage extends \Eloquent {
	protected $table = 'product_packages';
	protected $fillable = [
		'product_id',
		'category_id',
		'order',
		'width',
		'height',
		'price',
		'is_global'
	];
	public function category(){
		return $this->hasOne('ProductCategory','id', 'category_id');
	}
}