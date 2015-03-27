<?php namespace Admin;

use Iboostme\Product\ProductFormatter;
use User;
use Product;
use ProductBrand;
use ProductType;
use ProductStatus;
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

        $this->imageGenerateData['thumbs'] = array('width' => '336', 'height' => '459' );

        /*$this->imageGenerateData['preview'] = array('width' => '500', 'height' => '' );
        $this->imageGenerateData['square'] = array('width' => '400', 'height' => '400' );
        $this->imageGenerateData['horizontal'] = array('width' => '430', 'height' => '340' );
        $this->imageGenerateData['vertical'] = array('width' => '340', 'height' => '430' );*/

        JavaScript::put([
            'updateUrl' => route('admin.frame.update'), // url to update a product
            'progressUrl' => route('admin.frame.saveSelection'), // url to save the upload image selection data
            'uploadUrl' => route('admin.frame.doUpload'), // url to upload an image
            'onCompleteUrl' => route('admin.design.manage', ['status' => 'unpublished']), // redirect to specified url after uploading completed.
        ]);
    }

    // frame design view
    public function getFrameDesign(){
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

    // frame application view
    public function getFrameApplication(){
        $product = Product::first(); // get the product
        JavaScript::put([
            'square_image' => urlencode($product->present()->image('square')),
            'preview_image' => urlencode($product->present()->image('preview')),
            'frameList' => $this->productFormatter->frameBulkFormat(ProductFrame::where('is_active', 1)->get()),
            'backgroundList' => $this->productFormatter->backgroundBulkFormat(ProductBackground::where('is_active', 1)->get()),
        ]);
        $this->data['product'] = $product;
        $this->data['pageTitle'] = $product->present()->title;
        return View::make('admin.frame-application', $this->data);
    }

    // frame border view
    public function getFrameBorder(){
        JavaScript::put([
            'frameList' => $this->productFormatter->frameBulkFormat(ProductFrame::get()),
        ]);
        $this->data['pageTitle'] = 'Frame Borders';
        return View::make('admin.frame-border', $this->data);
    }

    // create and upload new frame border
    public function uploadFrameBorder(){
        return View::make('admin.frame-border-upload', $this->data);
    }

    // frame design upload view
    public function uploadFrameParts(){
        JavaScript::put([
            'categories' => $this->data['categories'],
            'brands' => ProductBrand::get(),
            'types' => ProductType::get(),
            'frame_part' => 'designs',
        ]);
        return View::make('admin.frame-upload', $this->data);
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

    // upload and save frame parts
    public function postUploadFrameParts(){
        $frameData = Session::get('frame_data');
        $this->image_name = Str::random(20).'.jpg'; // image name
        $oldImageFile = '';
        $img = Image::make( $_FILES['file']['tmp_name']  ); // create image object

        //frame
        /*if( $frameData['part'] == $this->parts[1] ){
            $path = 'uploads/products/frames/'.$frameData['size_type'].'/'; // path of original image
            $img->save( public_path($path.$this->image_name) );

            $frame = new ProductFrame();
            $frame->image = $this->image_name;
            $frame->save();

            return [
                'part' => $frameData['part'],
                'part_image' => asset($path.$this->image_name)
            ];
        }*/

        //background
        if( $frameData['part'] == $this->parts[2] ){
            $path = 'uploads/products/backgrounds/'; // path of original image
            $img->fit(641, 445);
            $img->save( public_path($path.$this->image_name) );

            $bg = new ProductBackground();
            $bg->image = $this->image_name;
            $bg->save();

            return [
                'part' => $frameData['part'],
                'part_image' => asset($path.$this->image_name)
            ];
        }

        $productID = isset( $frameData['product'] ) ? $frameData['product'] : '';
        $tempDir = public_path('uploads/products/'.$frameData['part'].'/original/'); // path of original image
        if (!file_exists($tempDir)) {
            mkdir($tempDir);
        }

        // upload original
        $img->save( $tempDir.'/'. $this->image_name );

        // save a product
        $repo = new ProductRepository();
        if($productID){
            $product = Product::find( $productID );
            $oldImageFile = $product->image;

            $product->image = $this->image_name;
            $product->width = $img->width();
            $product->height = $img->height();
            $product->image_type = 'square';
            $product->image_original_type = $repo->getImageSizeType( $img->width(), $img->height() );
            $product->save();
        }else{
            $product = new Product();
            $product->status_id = $repo->status('unpublished')->id;
            $product->category_id = $repo->category($frameData['category'])->id;
            $product->brand_id = $repo->brand($frameData['brand'])->id;
            $product->type_id = $repo->type($frameData['type'])->id;
            $product->image = $this->image_name;
            $product->width = $img->width();
            $product->height = $img->height();
            $product->image_type = 'square';
            $product->image_original_type = $repo->getImageSizeType( $img->width(), $img->height() );
            $product->save();
        }

        // generate thumbs
        foreach( $this->imageGenerateData as $type => $data ){
            $image_name = $this->image_name;
            $image_width = $data['width'];
            $image_height = $data['height'];
            $image_destination = public_path('uploads/products/'.$frameData['part'].'/'.$type.'/'); // path to generated images

            if (!file_exists($image_destination)) {
                mkdir($image_destination);
            }

            // resize image
            if($type != 'preview'){
                $img->fit($image_width, $image_height);
            }else{
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            // save image
            $img->save($image_destination.$image_name);

            if($oldImageFile){
                unlink( $image_destination.'/'. $oldImageFile ); // remove the previous image
            }

        }
        if($oldImageFile){
            unlink( $tempDir.'/'. $oldImageFile ); // remove the previous image
        }


        Session::forget('frame_data'); // forget session data


        // Just imitate that the file was stored.
        echo json_encode([
            'success' => true,
            'files' => $_FILES,
            'get' => $_GET,
            'post' => $_POST,
            //optional
            'flowTotalSize' => isset($_FILES['file']) ? $_FILES['file']['size'] : $_GET['flowTotalSize'],
            'flowIdentifier' => isset($_FILES['file']) ? $_FILES['file']['name'] . '-' . $_FILES['file']['size']
                : $_GET['flowIdentifier'],
            'flowFilename' => isset($_FILES['file']) ? $_FILES['file']['name'] : $_GET['flowFilename'],
            'flowRelativePath' => isset($_FILES['file']) ? $_FILES['file']['tmp_name'] : $_GET['flowRelativePath']
        ]);
    }

    public function postSaveSelection(){
        Session::put('frame_data', Input::all() );
        return Session::get('frame_data');
    }

    public function postUpdateProduct(){
        $product_id = Input::get('id'); $data = Input::all();
        $isUpdated = Product::find( $product_id )->update( $data );
        $product = Product::find( $product_id );
        return array(
            'status' => $isUpdated == true ? 'success' : 'failed',
            'product' => $product
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

    public function postFramePartDelete(){
        $part = Input::get('part');
        $sizeType = Input::get('size_type');
        $itemId = Input::get('id');

        if($part == 'frame'){
            $path = 'uploads/products/frames/'.$sizeType.'/'; // path of original image
            $frame = ProductFrame::find($itemId);

            unlink( public_path($path). $frame->image ); // remove the previous image
            $frame->delete();
        }
        if($part == 'background' ){
            $path = 'uploads/products/backgrounds/'; // path of original image
            $bg = ProductBackground::find($itemId);

            unlink( public_path($path). $bg->image ); // remove the previous image
            $bg->delete();
        }
        return trace(Input::all());
    }

    private function generateThumbnail($img){

    }
}