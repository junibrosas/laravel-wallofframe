<?php

class ProductPackage extends \Eloquent {
	protected $table = 'product_packages';
	protected $fillable = [
		'order',
		'width',
		'height',
		'price',
	];
}