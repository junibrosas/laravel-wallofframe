<?php
use Iboostme\Product\ProductRepository;

class HomeController extends BaseController {

	public $productRepo;

	public function __construct(ProductRepository $productRepo){
		$this->productRepo = $productRepo;
	}

	public function index()
	{
		$this->data['mustHaves'] = Product::orderByRaw("RAND()")->take(4)->get();
		$this->data['products'] = Product::orderByRaw("RAND()")->take(4)->get();
		$this->data['product'] = Product::first(); // frame of the week
		return View::make('index', $this->data);
	}


}
