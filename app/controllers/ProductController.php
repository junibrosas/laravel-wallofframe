<?php
use Iboostme\Product\ProductRepository;
use Iboostme\Product\ProductFormatter;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Iboostme\Product\Size\ProductSizeRepository;
class ProductController extends \BaseController {
	public $productRepo;
	public $productFormatter;
	public $sizeRepository;
	public $take = 20;
	public $page = 1;

	public function __construct(ProductRepository $productRepo,
								ProductFormatter $productFormatter,
								ProductSizeRepository $productSizeRepository){
		$this->productFormatter = $productFormatter;
		$this->productRepo = $productRepo;
		$this->sizeRepository = $productSizeRepository;
	}

	public function index($id, $slug = ''){
		$product = $this->productRepo->find($id); // get the product
		$products = Product::orderby(DB::raw('RAND()'))->take(10)->get(); // products to be used in the related.

		$this->data['products'] = $products; // related products
		$this->data['pageTitle'] = $product->present()->title;
		$this->data['product'] = $product;

		JavaScript::put([
			'frameSizes' => $this->sizeRepository->getSizes($product),
			'square_image' => urlencode($product->present()->imageWithType('square')),
			'frameList' => $this->productFormatter->frameBulkFormat(ProductFrame::where('is_active', 1)->get()),
		]);

		// save cookie to product that has been viewed.
		return Response::make( View::make('posts.product', $this->data));
	}

	public function getNewArrivals()
	{
		$items = $this->productRepo->getAll(); // popular products

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

		$this->data['pageTitle'] = $brand->name . ' Brands';
		$this->data['heading'] = $this->data['pageTitle'];

		JavaScript::put([ 'loadEnabled' => true, 'apiUrl' => route('product.api.brand', [$brand->slug, 'status' => '']) ]); // enable angular product browsing

		return View::make('home.products', $this->data);
	}

	public function getCurrencyAndChange(){
		Session::put('out_currency', Input::get('currency') );
	}




}