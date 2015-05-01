<?php

class ProductPackage extends \Eloquent {
	protected $table = 'product_packages';
	protected $fillable = [
		'width',
		'height',
		'gloss',
		'matte'
	];
}