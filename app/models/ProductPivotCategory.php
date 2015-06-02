<?php
use Illuminate\Support\Facades\Validator;

class ProductPivotCategory extends \Eloquent {
	protected $table = 'product_pivot_categories';
	protected $fillable = [
		'product_category_id', 'product_id'
	];
}