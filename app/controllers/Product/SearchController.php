<?php namespace Product;
use Iboostme\Product\Search\SearchRepository;
use Illuminate\Support\Facades\Input;
use Iboostme\Product\ProductRepository;
use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;

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
        $this->data['input'] = Input::all(); //saves the search input values.
        JavaScript::put(
            ['price_min' => Input::get('price_min'), 'price_max' => Input::get('price_max')]
        );
        return View::make('home.products', $this->data);
    }
}