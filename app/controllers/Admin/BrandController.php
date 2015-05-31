<?php namespace Admin;
use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use ProductBrand;

class BrandController extends \BaseController {
    public function index(){
        $brands = ProductBrand::get();
        $brands->each(function($brand){
            $brand->image = $brand->present()->image;
            $brand->totalDesigns = 123;
        });
        JavaScript::put([
            'tableData' => $brands
        ]);
        return View::make('admin.brands', $this->data);
    }

    public function update(){
        $brandId = Input::get('id');
        $brand = ProductBrand::find($brandId);
        $brand->name = Input::get('name');

        return Response::json(array(
            'success' => $brand->save(),
            'responseMessage' => 'Successfully Updated.'
        ));
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
            ProductBrand::whereIn('id', $items)->delete();
        }else{
            return Redirect::back()->with('error', NO_ACTION_SELECTED);
        }

        return Redirect::back()->with('success', DONE);
    }
} 