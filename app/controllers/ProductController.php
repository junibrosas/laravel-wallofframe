<?php
use Iboostme\Product\ProductRepository;
use Iboostme\Product\ProductFormatter;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
class ProductController extends \BaseController {
	public $productRepo;
	public $productFormatter;
	public $take = 20;
	public $page = 1;

	public function __construct(ProductRepository $productRepo, ProductFormatter $productFormatter){
		$this->productFormatter = $productFormatter;
		$this->productRepo = $productRepo;
	}

	public function index($id, $slug = ''){
		$product = $this->productRepo->find($id); // get the product
		$products = Product::orderby(DB::raw('RAND()'))->take(10)->get();
		//$this->productRepo->setView($id); // set a unique view

		$this->data['products'] = $products; // related products
		$this->data['pageTitle'] = $product->present()->title;
		$this->data['product'] = $product;

		JavaScript::put([
			'frameSizes' => ProductPackage::get(),
			'square_image' => urlencode($product->present()->image('square')),
			'preview_image' => urlencode($product->present()->image('preview')),
			'frameList' => $this->productFormatter->frameBulkFormat(ProductFrame::where('is_active', 1)->get()),
            'backgroundList' => $this->productFormatter->backgroundBulkFormat(ProductBackground::where('is_active', 1)->get()),
		]);


		// save cookie to product that has been viewed.
		return Response::make( View::make('posts.product', $this->data))
			->withCookie( Cookie::make('product_viewed_id', $id) );
	}

	public function getNewArrivals()
	{
		$items = $this->productRepo->getViews(); // popular products

		$this->data['items'] = $items;
		$this->data['heading'] = 'New Arrivals';
		$this->data['pageTitle'] = $this->data['heading'];

		JavaScript::put([ 'loadEnabled' => true, 'apiUrl' => route('product.api.arrivals', ['status' => '']) ]); // enable angular product browsing

		return View::make('home.products', $this->data);
	}

	public function getBestSelling(){
		$items = $this->productRepo->getViews(); // popular products

		$this->data['items'] = $items;
		$this->data['heading'] = 'Best Selling';
		$this->data['pageTitle'] = $this->data['heading'];

		JavaScript::put([ 'loadEnabled' => true, 'apiUrl' => route('product.api.bestSelling', ['status' => '']) ]); // enable angular product browsing

		return View::make('home.products', $this->data);
	}

	public function getByCategory( $slug ){
		$category = $this->productRepo->category($slug);
		if(!$category)
			return Redirect::route('home.index')->with('error', PRODUCT_CATEGORY_NOT_FOUND);

		//$items = $this->productRepo->getViews(); // popular products

		//$this->data['items'] = $items;
		$this->data['pageTitle'] = $category->name;
		$this->data['heading'] = $this->data['pageTitle'];

		JavaScript::put([ 'loadEnabled' => true, 'apiUrl' => route('product.api.category', [$category->slug, 'status' => ''] ) ]); // enable angular product browsing

		return View::make('home.products', $this->data);
	}

	public function getByType( $slug ){
		$type = $this->productRepo->type($slug);
		if(!$type)
			return Redirect::route('home.index')->with('error', PRODUCT_TYPE_NOT_FOUND);

		$items = $this->productRepo->getViews(); // popular products

		$this->data['items'] = $items;
		$this->data['pageTitle'] = $type->name;
		$this->data['heading'] = $this->data['pageTitle'];

		JavaScript::put([ 'loadEnabled' => true, 'apiUrl' => route('product.api.type', [$type->slug, 'status' => '']) ]); // enable angular product browsing

		return View::make('home.products', $this->data);
	}

	public function getBrands(){
		$brands = ProductBrand::get();

		$this->data['brands'] = $brands;
		$this->data['heading'] = 'Brands';
		$this->data['pageTitle'] = $this->data['heading'];
		return View::make('home.brands', $this->data);
	}

	public function getByBrands($id, $slug){
		$brand = ProductBrand::find($id);
		if(!$brand) return Redirect::route('home.index');

		$items = $this->productRepo->getViews(); // popular products

		$this->data['items'] = $items;
		$this->data['pageTitle'] = $brand->name . ' Brands';
		$this->data['heading'] = $this->data['pageTitle'];
		$this->data['has_images'] = true;

		JavaScript::put([ 'loadEnabled' => true, 'apiUrl' => route('product.api.brand', [$brand->slug, 'status' => '']) ]); // enable angular product browsing

		return View::make('home.products', $this->data);
	}

	public function getCurrencyAndChange(){
		Session::put('out_currency', Input::get('currency') );
	}

	public function addToBag($id){
		$product = Product::find($id);
		$package = ProductPackage::find( Input::get('size') );

		if(!$product){
			return Redirect::back()->with('error', PRODUCT_NOT_FOUND);
		}
		if(!$package){
			return Redirect::back()->with('error', 'Please select a product size.');
		}


		$productData = array('id' => $product->id,
			'name' => $product->title,
			'qty' => 1,
			'price' => $package->price,
			'options' => array(
				'url' => $product->present()->url,
				'image' => $product->present()->image('square'),
				'width' => $package->width,
				'height' => $package->height,
				'category' => $product->present()->category,
				'type' => $product->present()->type,
				'category_slug' => $product->category->slug,

			)
		);

		// add new product to the bag.
		Cart::add( $productData );

		/*$product->package_id = $package->id;
		$this->productRepo->addToBag($product);*/

		return Redirect::back()->with('success', ADDED_TO_BAG);
	}


}