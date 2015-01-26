<?php

class ProductStatus extends \Eloquent {
	protected $table = 'product_statuses';
	protected $fillable = [
		'name',
		'slug'
	];
}