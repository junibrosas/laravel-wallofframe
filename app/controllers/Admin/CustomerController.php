<?php namespace Admin;

use User;
use Iboostme\User\UserRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Facades\View;

class CustomerController extends \BaseController {
    public $userRepo;
    public function __construct(UserRepository $userRepository){
        $this->userRepo = $userRepository;
    }

    public function index(){
        $customers = $this->userRepo->getCustomers();

        // assign value to table data.
        Javascript::put([
            'tableData' => $customers
        ]);
        $this->data['customers'] = $customers;
        $this->data['suffix'] = 'customers';
        return View::make('admin.customers', $this->data);
    }
}