<?php

class ProductView extends \Eloquent {
	protected $table = 'product_views';
	protected $fillable = [
		'product_id',
		'ip_address',
		'info'
	];
}