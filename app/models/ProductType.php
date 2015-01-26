<?php

class ProductType extends \Eloquent {
	protected $table = 'product_types';
	protected $fillable = [
		'name',
		'slug'
	];
}