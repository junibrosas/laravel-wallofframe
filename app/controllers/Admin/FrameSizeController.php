<?php namespace Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

use ProductPackage;

class FrameSizeController extends \BaseController {
    // frame size view
    public function index(){
        $sizes = ProductPackage::orderBy('order', 'asc')->get();
        Javascript::put([
            'tableData' => $sizes
        ]);
        return View::make('admin.sizes', $this->data);
    }

    public function store(){
        $rules = [
            'order' => 'required|numeric|min:1|max:1000',
            'width' => 'required|numeric|min:10|max:1000',
            'height' => 'required|numeric|min:10|max:1000',
            'price' => 'required|numeric|min:5'
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Response::json(array(
                    'errors' => $validator->messages())
            );
        }

        ProductPackage::create(Input::all());
    }

    public function update(){
        $rules = [
            'order' => 'required|numeric|min:1|max:1000',
            'width' => 'required|numeric|min:10|max:1000',
            'height' => 'required|numeric|min:10|max:1000',
            'price' => 'required|numeric|min:5'
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Response::json(array(
                    'errors' => $validator->messages())
            );
        }

        $id = Input::get('id');
        ProductPackage::find( $id )->update( Input::all() );
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
            ProductPackage::whereIn('id', $items)->delete();
        }else{
            return Redirect::back()->with('error', NO_ACTION_SELECTED);
        }

        return Redirect::back()->with('success', DONE);
    }
}