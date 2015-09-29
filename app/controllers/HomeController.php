<?php
use Iboostme\Product\ProductRepository;

class HomeController extends BaseController {

	public $productRepo;

	public function __construct(ProductRepository $productRepo){
		$this->productRepo = $productRepo;
	}

	public function index()
	{
		$this->data['frameBoxData'] = [
			['image' => asset('img/framebox/boxframe1.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe2.jpg'), 'title' => 'Brands', 'tag' => 'features', 'url' => route('brands')],
			['image' => asset('img/framebox/boxframe3.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe4.jpg'), 'title' => 'Fashion Illustration', 'tag' => 'styles', 'url' => route('category', 'fashion')],
			['image' => asset('img/framebox/boxframe5.jpg'), 'title' => 'Cosmic Quotes', 'tag' => 'features', 'url' => route('category', 'cosmic-quotes')],
			['image' => asset('img/framebox/boxframe6.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe7.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe8.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe9.jpg'), 'title' => 'Packages', 'tag' => '', 'url' => route('category', 'packages')],
		];
		$this->data['url_collection'] = route('browse.type', ['collections']);

		return View::make('home-better', $this->data);
	}

	public function homeBetter(){
		$this->data['frameBoxData'] = [
			['image' => asset('img/framebox/boxframe1.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe2.jpg'), 'title' => 'Brands', 'tag' => 'features', 'url' => route('brands')],
			['image' => asset('img/framebox/boxframe3.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe4.jpg'), 'title' => 'Fashion Illustration', 'tag' => 'styles', 'url' => route('category', 'fashion')],
			['image' => asset('img/framebox/boxframe5.jpg'), 'title' => 'Cosmic Quotes', 'tag' => 'features', 'url' => route('category', 'cosmic-quotes')],
			['image' => asset('img/framebox/boxframe6.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe7.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe8.jpg'), 'title' => '', 'tag' => '', 'url' => ''],
			['image' => asset('img/framebox/boxframe9.jpg'), 'title' => 'Packages', 'tag' => '', 'url' => route('category', 'packages')],
		];
		$this->data['url_collection'] = route('browse.type', ['collections']);
		return View::make('home-better', $this->data);
	}


}
