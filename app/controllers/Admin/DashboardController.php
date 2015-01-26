<?php namespace Admin;

use User;
use Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validate;

class DashboardController extends \BaseController {
    public function index(){
        $this->data['user'] = Auth::user();
        return View::make('admin.dashboard', $this->data);
    }
}