<?php
namespace Admin;
use Iboostme\Formatter\TransactionFormatter;
use Iboostme\Transaction\TransactionRepository;
use Iboostme\Product\Cart\CartRepository;
use Iboostme\Transaction\TransactionStatusRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class OrderController extends \BaseController{
    public $transactionRepo;
    public $cartRepo;
    public $transactionStatusRepo;
    public function __construct( TransactionRepository $transactionRepository,
                                 CartRepository $cartRepository,
                                 TransactionStatusRepository $transactionStatusRepository ){
        $this->transactionRepo = $transactionRepository;
        $this->cartRepo = $cartRepository;
        $this->transactionStatusRepo = $transactionStatusRepository;
    }


    // Retrieves all the orders from an administrator's perspective.
    public function orders(){
        $format = new TransactionFormatter();

        $orders = $format->bulkFormat( $this->transactionRepo->getTransactions() );

        $this->data['orders'] = $orders;
        $this->data['pageTitle'] = 'Orders';

        return View::make('admin.orders', $this->data);
    }

    // Retrieve a single order
    public function order( $trackingNumber ){
        $order = $this->transactionRepo->getByTrackingNumber( $trackingNumber ); // retrieve a single order
        $products = $this->cartRepo->getCartItems( json_decode($order->products) ); // retrieve products from this order.
        $total_amount = $order->present()->totalAmount; // products with quantity property

        $this->data['total_amount'] = $total_amount;
        $this->data['order'] = $order;
        $this->data['products'] = $products;
        $this->data['pageTitle'] = 'Order ' . $order->tracking_number;
        return View::make('admin.order', $this->data);
    }

    // Creates a new order.
    public function newOrder(){
        $this->data['pageTitle'] = 'New Order';
        return View::make('admin.order-new', $this->data);
    }

    public function postBulkActions(){
        $transactions = Input::get('transactions'); $actions = Input::get('bulk_action');
        if(!$transactions) return Redirect::back()->with('error', 'No transactions has been selected.');
        if(!$actions) return Redirect::back()->with('error', 'No action has been selected.');

        // Change status
        $this->transactionStatusRepo->changeStatus( Input::get('transactions'), Input::get('bulk_action') );

        return Redirect::back()->with('success', DONE);
    }
} 