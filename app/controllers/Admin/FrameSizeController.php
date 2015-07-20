<?php namespace Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use ProductPackage;
use ProductCategory;
class FrameSizeController extends \BaseController {
    // frame size view
    public function index(){
        $sizes = ProductPackage::where('is_global' , 1)->orderBy('category_id', 'asc')->orderBy('order', 'asc')->with('category')->get();
        Javascript::put([
            'tableData' => $sizes,
            'categories' => ProductCategory::get()
        ]);
        return View::make('admin.sizes', $this->data);
    }

    public function sizeModal(){
        $product_id = Input::get('product');


        $sizes = ProductPackage::where('product_id', $product_id)->orderBy('category_id', 'asc')->orderBy('order', 'asc')->with('category')->get();

        $this->data['product_id'] = $product_id;
        $this->data['sizes'] = $sizes;
        $this->data['categories'] = ProductCategory::get();
        return View::make('admin.sizes-modal', $this->data);
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

    public function postAddCustomSize(){
        ProductPackage::create(Input::all());

        return Redirect::back();
    }

    public function postDeleteCustomSize(){
        ProductPackage::find(Input::get('size_id'))->delete();

        return Redirect::back();
    }
}