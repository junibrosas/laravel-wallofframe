<?php namespace Admin;

use User;
use Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validate;

class ContactController extends \BaseController {

	public function __construct(){
		parent::__construct();

	}

	public function index()
	{
		$this->data['contacts'] = Contact::orderby('created_at','desc')->get();
		$this->data['html'] = 'admin.contacts.index';

		return View::make('admin.admin', $this->data);
	}
	public function create()
	{
		$contact = new Contact();
		$validator = $contact->validate( Input::all() );
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		Contact::create( Input::all() ); // saves a new contact
		return Redirect::back()->with('success', CONTACT_SUCCESS);
	}

	public function destroy()
	{
		$contact = Contact::find( Input::get('contact_id') );

		if( !$contact ){
			return 'No contact found';
		}

		$contact->delete();

		return Redirect::back()->with('success', 'Contact successfully deleted');
	}

}