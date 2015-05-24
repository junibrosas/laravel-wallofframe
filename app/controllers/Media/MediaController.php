<?php namespace Media;
use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Attachment;
class MediaController extends \BaseController {
    public function __construct()
    {
        parent::__construct();
        JavaScript::put([
            'updateUrl' => route('admin.frame.update'), // url to update a product
            'progressUrl' => route('admin.frame.saveSelection'), // url to save the upload image selection data
            'uploadUrl' => route('media.upload'), // url to upload an image
            'onCompleteUrl' => route('admin.design.manage', ['status' => 'unpublished']), // redirect to specified url after uploading completed.
        ]);

    }

    public function index(){


        return View::make('media.media', $this->data);
    }


    // display the modal via ajax
    public function modal(){
        return Attachment::orderBy('created_at', 'desc')->get()->toJson();
    }


    // uploading media library modal
    public function upload(){

        $this->data['attachments'] = Attachment::orderBy('created_at', 'desc')->get();
        return View::make('media.media-upload', $this->data);
    }

    public function store(){
        // path of original image
        $tempDir = public_path('uploads/attachments');

        $assetDir = asset('uploads/attachments');


        // original file name
        $imgName = Input::get('flowFilename');

        // create a new randomized image filename
        $randomFileName = Str::random(20).'.jpg';

        // create image object via intervention image.
        $img = Image::make( $_FILES['file']['tmp_name']  );



        // save the image
        $img->save( $tempDir.'/'. $randomFileName );

        $explosion = explode('.', $imgName);

        // save to the database.
        Attachment::create([
            'user_id' => Auth::id(),
            'url' => $assetDir.'/'. $randomFileName,
            'name' => $explosion[0],
            'filename' => $randomFileName,
            'mime_type' => $img->mime()
        ]);

        echo json_encode(Input::all());
    }

    // query the items selected by the modal and return a response
    public function ajaxGetItems(){
        $items = Input::get('items'); // get the array of item ids.

        return Attachment::whereIn('id', $items)->get()->toJson();
    }


}