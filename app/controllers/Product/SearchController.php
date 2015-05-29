<?php namespace Product;
use Illuminate\Support\Facades\Input;
use Iboostme\Product\ProductRepository;
use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;

class SearchController extends \BaseController{
    protected $searchRepo;
    protected $productRepo;
    public function __construct(ProductRepository $productRepo ){
        $this->productRepo = $productRepo;
    }
    public function getSearch(){

        $this->data['pageTitle'] = 'Search Result';
        $this->data['heading'] = $this->data['pageTitle'];
        $this->data['input'] = Input::all(); //saves the search input values.
        JavaScript::put(
            [
                'price_min' => Input::get('price_min'),
                'price_max' => Input::get('price_max'),
                'loadEnabled' => true,
                'apiUrl' => route('product.api.search', Input::all() )
            ]
        );
        return View::make('home.products', $this->data);
    }
}