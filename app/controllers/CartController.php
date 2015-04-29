<?php
use Iboostme\Product\ProductRepository;
use Iboostme\Product\Cart\CartRepository;
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
		if( $this->cartRepo->isCartEmpty() ){
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

		return View::make('checkout.cart', $this->data);
	}

	// Remove an item in the cart
	public function removeItem(){
		$product = Product::findOrFail( Input::get('product') );

		//remove an item
		$bag = $this->cartRepo->removeItem(
			Session::get('product_bag'),
			$product);

		Session::put('product_bag', $bag); // refresh the bag.

		return Redirect::back()->with('success', CART_ITEM_REMOVE);
	}

	// Change the quantity of an item in the cart
	public function changeQuantity(){
		$product = Product::findOrFail( Input::get('product') );

		$bag = $this->cartRepo->changeQuantity(
				Session::get('product_bag'),
				Input::get('quantity') + 1,
				$product);

		Session::put('product_bag', $bag); // refresh the bag.

		return Redirect::back()->with('success', CART_QUANTITY_CHANGED);
	}
}