<?php namespace Admin;

use Iboostme\Email\EmailRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use User;
use Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validate;
use Illuminate\Support\Str;

class ContactController extends \BaseController {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{

		$contacts = Contact::orderby('created_at','desc')->get();
		$contacts->each(function($contact){
			$contact->url = route('contacts.message', [$contact->id, Str::slug( $contact->subject ) ]);
			$contact->subject = $contact->subject ==  '' ? 'No Subject' : $contact->subject;
			$contact->date = $contact->created_at->diffForHumans();
		});
		$this->data['contacts'] = $contacts;
		$this->data['html'] = 'admin.contacts.index';

		// pass table data.
		JavaScript::put([
			'tableData' => $contacts
		]);

		return View::make('admin.contacts', $this->data);
	}

	public function read( $id ){
		$contact = Contact::find( $id );
		$contact->subject = $contact->subject ==  '' ? 'No Subject' : $contact->subject;
		$this->data['contact'] = $contact;
		return View::make('admin.contact-message', $this->data);

	}

	public function create()
	{
		$contact = new Contact();
		$validator = $contact->validate( Input::all() );
		if($validator->fails()){
			return Response::json(array(
					'errors' => $validator->messages())
			);
		}
		$emailRepo = new EmailRepository();
		$emailRepo->newContact( Input::all() );

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

	// process the bulk action
	public function postActions(){
		$bulkAction = Input::get('bulk_action');
		$items = Input::get('tableItems');

		if(!$items){
			return Redirect::back()->with('error', NO_ITEMS_SELECTED);
		}

		if(in_array($bulkAction, ['delete'])){

			// Delete selected sizes.
			Contact::whereIn('id', $items)->delete();
		}else{
			return Redirect::back()->with('error', NO_ACTION_SELECTED);
		}

		return Redirect::back()->with('success', DONE);
	}

}