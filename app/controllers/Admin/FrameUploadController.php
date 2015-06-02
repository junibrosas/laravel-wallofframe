<?php namespace Admin;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Iboostme\Product\ProductRepository;
use Attachment;
use Product;
use ProductBrand;
use ProductType;
use ProductCategory;
use ProductStatus;
use ProductPivotCategory;


class FrameUploadController extends \BaseController {

    public function __construct(){
        $this->imageGenerateData['square'] = array('width' => '300', 'height' => '300' );
        $this->imageGenerateData['horizontal'] = array('width' => '330', 'height' => '240' );
        $this->imageGenerateData['vertical'] = array('width' => '240', 'height' => '330' );
    }

    // GET
    public function index(){
        JavaScript::put([
            'uploadUrl' => route('media.upload'), // url to upload an image
        ]);
        return View::make('admin.frame-add', $this->data);
    }

    // POST
    // return the configurations needed for frame uploading
    public function config(){
        return Response::json([
            'categories' => ProductCategory::get(),
            'brands' => ProductBrand::get(),
            'types' => ProductType::get(),
            'statuses' => ProductStatus::get(),
        ]);
    }

    // POST
    // resize and store new frame designs
    public function store(){
        $input = Input::all();

        if(!$input['designs']){
            return Redirect::back()->with('error', NO_DESIGN_SELECTED);
        }
        $attachments = Attachment::whereIn('id', $input['designs'])->get();

        foreach($attachments as $attach){
            // create image object
            $img = Image::make( public_path('uploads/attachments/' . $attach->filename ) );

            // generate thumbs
            foreach( $this->imageGenerateData as $type => $data ){
                $image_width = $data['width'];
                $image_height = $data['height'];
                $image_destination = public_path('uploads/products/designs/'.$type.'/'); // path to generated images

                // create directory if not exists.
                if (!file_exists($image_destination)) {
                    mkdir($image_destination);
                }

                // resize image
                $img->fit($image_width, $image_height);

                // save image to directory
                $img->save($image_destination.$attach->filename);
            }

            // store to database.
            $product = new Product();
            $repo = new ProductRepository();
            $product->status_id = $repo->status('published')->id;
            $product->brand_id = $repo->brand(array_get($input, 'brand'))->id;
            $product->type_id = $repo->type(array_get($input, 'type'))->id;
            $product->filename = $attach->filename;
            $product->attachment_id = $attach->id;
            $product->title = $attach->name;
            $product->slug = Str::slug( $product->title );
            $product->is_available = 1;
            $product->save();

            // store product category
            $categories = $input['categories'];

            // create new product categories
            if(count($categories) > 0){
                foreach($categories as $categoryId){
                    $productPivotCategory = new ProductPivotCategory();
                    $productPivotCategory->product_id = $product->id;
                    $productPivotCategory->product_category_id = $categoryId;
                    $productPivotCategory->save();
                }
            }
        }


        //redirect to frame manage.
        return Redirect::route('admin.design.manage')->with('success', DONE);
    }

}