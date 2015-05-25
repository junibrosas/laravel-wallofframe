<?php
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Product extends \Eloquent {
	use PresentableTrait;
	use SoftDeletingTrait;

	protected $table = 'products';
	protected $presenter = 'Iboostme\Product\ProductPresenter';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'attachment_id','status_id','type_id','category_id','brand_id','title','content','slug','filename','is_available'
	];

	public function newQuery($excludeDeleted = true)
	{
		$query = parent::newQuery($excludeDeleted);
		//$query->where('is_available', '1');
		return $query;
	}

	public function status(){
		return $this->hasOne('ProductStatus', 'id', 'status_id');
	}

	public function category(){
		return $this->hasOne('ProductCategory', 'id', 'category_id');
	}

	public function brand(){
		return $this->hasOne('ProductBrand', 'id', 'brand_id');
	}


	public function type(){
		return $this->hasOne('ProductType', 'id', 'type_id');
	}

	public function wishlist(){
		return $this->hasOne('Wishlist', 'product_id', 'id');
	}

	public function attachment(){
		return $this->belongsTo('Attachment');
	}
}