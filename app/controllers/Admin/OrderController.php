<?php
namespace Admin;
use Iboostme\Formatter\TransactionFormatter;
use Iboostme\Transaction\TransactionRepository;
use Iboostme\Product\Cart\CartRepository;
use Illuminate\Support\Facades\View;

class OrderController extends \BaseController{
    public $transactionRepo;
    public function __construct( TransactionRepository $transactionRepository,
                                 CartRepository $cartRepository ){
        $this->transactionRepo = $transactionRepository;
        $this->cartRepo = $cartRepository;
    }


    // Retrieves all the orders from an administrator's perspective.
    public function orders(){
        $format = new TransactionFormatter();

        $orders = $format->bulkFormat( $this->transactionRepo->getTransactions() );

        $this->data['orders'] = $orders;

        return View::make('admin.orders', $this->data);
    }

    // Retrieve a single order
    public function order( $trackingNumber ){
        $order = $this->transactionRepo->getByTrackingNumber( $trackingNumber ); // retrieve a single order
        $products = $this->cartRepo->getCartItems( json_decode($order->products) ); // retrieve products from this order.

        $this->data['order'] = $order;

        trace($products);
        //return View::make('', $this->data);
    }
} 