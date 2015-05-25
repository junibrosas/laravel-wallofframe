<?php namespace Admin;

use Iboostme\Product\Border\FrameBorder;
use Iboostme\Product\ProductFormatter;
use User;
use Product;
use ProductBrand;
use ProductType;
use ProductStatus;
use ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validate;
use Intervention\Image\Facades\Image;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Facades\Session;
use Iboostme\Product\ProductRepository;
use Illuminate\Support\Str;
use ProductFrame;
use ProductBackground;
use ProductPackage;
use Illuminate\Support\Facades\File;
use Attachment;


class FrameController extends \BaseController {
    public $image_name;
    public $image_width;
    public $image_height;
    public $image_destination;
    public $imageGenerateData;
    public $productRepo;
    public $productFormatter;
    public $parts = ['design', 'frame', 'background'];
    public function __construct(ProductRepository $productRepo, ProductFormatter $productFormatter ){
        parent::__construct();
        $this->productFormatter = $productFormatter;

        JavaScript::put([
            'updateUrl' => route('admin.frame.update'), // url to update a product
            'progressUrl' => route('admin.frame.saveSelection'), // url to save the upload image selection data
            //'uploadUrl' => route('admin.frame.doUpload'), // url to upload an image
            'onCompleteUrl' => route('admin.design.manage', ['status' => 'unpublished']), // redirect to specified url after uploading completed.
        ]);
    }

    // frame design view
    public function getDesigns(){
        $status = Input::get('status') ? Input::get('status') : '';
        JavaScript::put([
            'productDeleteUrl' => route('admin.frame.delete'),
            'productNavigationUrl' => route('product.api.nav'),
            'productUrl' => route('product.api.status', ['status'=>$status]),
            'loadEnabled' => true,
            'categories' => $this->data['categories'],
            'brands' => ProductBrand::get(),
            'types' => ProductType::get(),
            'statuses' => ProductStatus::get(),
            'status' => $status,
            'frame_part' => 'designs'
        ]);
        return View::make('admin.frame-design', $this->data);
    }

    // frame border view
    public function getBorders(){
        $status = Input::get('status'); $frameBorder = new FrameBorder();
        $frameData = ProductFrame::orderBy('created_at', 'desc')->withTrashed()->get();
        $frameGroup = $frameBorder->tabItems($frameData);
        $frames = $frameData;
        if($status){
            if( isset($frameGroup[$status])){
                $frames = $frameGroup[$status];
            }
        }

        $frameList = $this->productFormatter->frameBulkFormat($frames);
        $this->data['pageTitle'] = 'Frame Borders';
        $this->data['frameList'] = $frameList;
        $this->data['frameGroup'] = $frameGroup;

        Javascript::put([
            'tableData' => $frameList,

        ]);

        return View::make('admin.frame-border', $this->data);
    }


    // create and upload new frame border
    public function uploadFrameBorder(){
        JavaScript::put([
            'frameSizes' => ProductPackage::get()
        ]);
        return View::make('admin.frame-border-upload', $this->data);
    }

    // upload and save new frame border
    public function postCreateFrameBorder(){

        $this->image_name = Str::random(20).'.jpg'; // image name
        $img = Image::make( $_FILES['file']['tmp_name']  ); // create image object
        $borderStyle = Input::get('custom_border_style');

        // upload
        $path = 'uploads/products/frames/'; // path of original image
        $img->save( public_path($path.$this->image_name) );

        // save
        $frame = new ProductFrame();
        $frame->image = $this->image_name;
        $frame->border_style = $borderStyle;
        $frame->is_active = 1;
        $frame->save();

        return Redirect::back()->with('success', FRAME_BORDER_UPLOAD_SUCCESS);
    }

    // stores a new frame border OR saves an edited one.
    public function postStoreFrameBorder(){
        $borderId = Input::get('border'); $borderName = Input::get('name');
        $border = ProductFrame::find( $borderId );
        if(!$border) return Redirect::back()->with('error', 'No frame border has been found.');

        $border->name = $borderName;
        $border->slug = Str::slug($borderName);
        $border->save();

        return Redirect::back()->with('success', DONE);
    }

    // manage frame borders
    public function postManageFrameBorders(){
        $bulkAction = Input::get('bulk_action');
        $selectedFrames = Input::get('selectedFrames');

        if(!$selectedFrames){
            return Redirect::back()->with('error', NO_ITEMS_SELECTED);
        }
        if(in_array($bulkAction,['activate', 'deactivate'])){
            $frames = ProductFrame::whereIn('id', $selectedFrames)->get();
            $frames->each( function($frame) use ( $bulkAction ){
                $frame->is_active = $bulkAction == 'activate' ? 1 : 0; // activate or deactivate selected frames
                $frame->save();
            } );
        }
        else if(in_array($bulkAction, ['delete'])){
            $frames = ProductFrame::whereIn('id', $selectedFrames)->get();
            $frames->each(function($frame){
                $file = public_path('uploads/products/frames/'.$frame->image);
                if( File::exists($file) ){
                    File::delete($file); // delete the file
                }
                $frame->forceDelete(); // delete selected frames
            });

        }else{
            return Redirect::back()->with('error', NO_ACTION_SELECTED);
        }

        return Redirect::back()->with('success', DONE);
    }

    public function postSaveSelection(){
        Session::put('frame_data', Input::all() );
        return Session::get('frame_data');
    }

    public function postUpdateProduct(){
        $designImageId = Input::get('designImage');
        $data = Input::all();
        if($designImageId){
            $attachment = Attachment::find($designImageId);
            $data['attachment_id'] = $attachment->id;
            $data['filename'] = $attachment->filename;
        }
        $product_id = Input::get('id');
        $data['slug'] = Str::slug($data['title']);
        $isUpdated = Product::find( $product_id )->update( $data );
        $product = Product::find( $product_id );

        return array(
            'status' => $isUpdated == true ? 'success' : 'failed',
            'product' =>  $this->productFormatter->format($product)
        );
    }

    public function postDeleteProduct(){
        $product_id = Input::get('id');
        Product::find($product_id)->delete();
    }

    public function postFramePartActivation(){
        $part = Input::get('part');
        $itemId = Input::get('id');
        $is_active = Input::get('is_active');

        if($part == 'frame'){
            $frame = ProductFrame::find($itemId);
            $frame->is_active = $is_active;
            $frame->save();
        }
        if($part == 'background' ){
            $bg = ProductBackground::find($itemId);
            $bg->is_active = $is_active;
            $bg->save();
        }

        

        return ['part' => $part];
    }

    public function postFrameDelete(){
        $sizeType = Input::get('size_type');
        $itemId = Input::get('id');

        $path = 'uploads/products/frames/'.$sizeType.'/'; // path of original image
        $frame = ProductFrame::find($itemId);

        unlink( public_path($path). $frame->image ); // remove the previous image
        $frame->delete();
    }



}