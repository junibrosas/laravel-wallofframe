<?php
use Laracasts\Presenter\PresentableTrait;
class ProductBrand extends \Eloquent {
	use PresentableTrait;

	protected $table = 'product_brands';
	protected $presenter = 'Iboostme\Product\Brand\BrandPresenter';
	protected $fillable = [
		'name',
		'slug',
		'description',
		'image'
	];
}