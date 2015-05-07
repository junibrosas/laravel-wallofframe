<?php
use Iboostme\Product\ProductRepository;
use Iboostme\Product\Cart\CartRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
class CartController extends \BaseController {
	public $productRepo;
	public $cartRepo;

	public function __construct(ProductRepository $productRepo, CartRepository $cartRepo){
		//$this->productRepo = $productRepo;
		$this->cartRepo = $cartRepo;
	}

	// Display the cart
	public function index()
	{
		if(Cart::count() <= 0){
			// add empty values for the variables
			Javascript::put([
				'tableData' => []
			]);
			$this->data['products'] = [];
			$this->data['total_amount'] = Cart::total();
			return View::make('checkout.cart', $this->data);
		}


		$products = Cart::content();
		$total_amount = Cart::total(); // products with quantity property

		$this->data['products'] = $products;
		$this->data['total_amount'] = $total_amount;
		$routeUrl = route('home.index');

		// backing url used in the 'continue shopping' button
		if($products->first()->options){
			$routeUrl = route('category', $products->first()->options->category_slug);
		}

		$productItems = array();
		foreach($products as $product){
			$productItems[] = $product;
 		}

		// add data to the table
		Javascript::put([
			'cartItems' => $productItems,
		]);
		$this->data['continueShoppingUrl'] = $routeUrl;
		return View::make('checkout.cart', $this->data);

		/*if( $this->cartRepo->isCartEmpty() ){
			$this->data['products'] = [];
			$this->data['total_amount'] = 0;
			return View::make('checkout.cart', $this->data);
		}


		$products = $this->cartRepo->getCartItems( Session::get('product_bag') );
		$total_amount = $this->cartRepo->getTotalAmount( $products ); // products with quantity property

		$this->data['total_amount'] = $total_amount;
		$this->data['products'] = $products;
		$routeUrl = route('home.index');

		if($products->first()->category){
			$routeUrl = route('category', $products->first()->category->slug);
		}
		$this->data['continueShoppingUrl'] = $routeUrl;

		return View::make('checkout.cart', $this->data);*/
	}

	// Remove an item in the cart
	public function removeItem(){
		$id = Input::get('rowid');

		//remove an item
		Cart::remove($id);

		return Redirect::back()->with('success', CART_ITEM_REMOVE);
	}

	// Update the items of the cart
	public function update(){
		$products = Input::get('products');
		if(count($products) > 0){
			foreach($products as $product){
				Cart::update($product['rowid'], $product);
			}
		}
	}

	// Change the quantity of an item in the cart
	public function changeQuantity(){
		$id = Input::get('rowid');
		$quantity = Input::get('qty');

		$isUpdated = Cart::update($id, $quantity);
		if(!$isUpdated){
			// is not updated
		}

		return Cart::get($id);


		return Redirect::back()->with('success', CART_QUANTITY_CHANGED);
	}
}