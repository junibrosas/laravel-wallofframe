<?php
use Iboostme\Product\ProductRepository;

class HomeController extends BaseController {

	public $productRepo;

	public function __construct(ProductRepository $productRepo){
		$this->productRepo = $productRepo;
	}

	public function index()
	{
		$this->data['mustHaves'] = $this->productRepo->getByRandom( 4 )->get();
		$this->data['products'] = $this->productRepo->getByRandom( 4 )->get();
		$this->data['product'] = Product::first(); // frame of the week
		$this->data['url_collection'] = route('browse.type', ['collections']);
		return View::make('index', $this->data);
	}


}
