<?php namespace Product;
use Iboostme\Product\Search\SearchRepository;
use Illuminate\Support\Facades\Input;
use Iboostme\Product\ProductRepository;
use Illuminate\Support\Facades\View;

class SearchController extends \BaseController{
    protected $searchRepo;
    protected $productRepo;
    public function __construct(SearchRepository $searchRepo, ProductRepository $productRepo ){
        $this->searchRepo = $searchRepo;
        $this->productRepo = $productRepo;
    }
    public function getSearch(){
        $products = $this->searchRepo->search( Input::all() );
        $items = $this->productRepo->getViews(); // popular products

        $this->data['products'] = $products->get();
        $this->data['items'] = $items;
        $this->data['pageTitle'] = 'Search Result';
        $this->data['heading'] = $this->data['pageTitle'];
        $this->data['has_images'] = true;

        return View::make('home.products', $this->data);
    }
}