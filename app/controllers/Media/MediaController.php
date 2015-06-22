<?php namespace Media;
use Iboostme\Media\Media;
use Iboostme\Media\MediaRepository;
use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Attachment;
class MediaController extends \BaseController {
    public $mediaRepo;

    public function __construct( MediaRepository $mediaRepository )
    {
        parent::__construct();

        $this->mediaRepo = $mediaRepository;

        JavaScript::put([
            'updateUrl' => route('admin.frame.update'), // url to update a product
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


    // store a new uploaded file from ngFlow
    public function store(){

        $media = new Media();

        // create image object via intervention image.
        $img = Image::make( $_FILES['file']['tmp_name']  );

        // new name of the uploaded image.
        $imgName = $media->randomName();

        // save the image
        $img->save( $media->imagePath( $imgName ) );

        // new image name
        $input['imageName'] = $imgName;

        // original file name
        $input['filename'] =  Input::get('flowFilename');

        // file mime type
        $input['mimeType'] = $img->mime();

        // save to the database.
        $attachment = $this->mediaRepo->store( $input );

        echo json_encode($attachment);
    }


    // Resize and store uploadImageed media objects. This function is specifically used for frames.
    public function storeAndResize(){
        $media = new Media();

        // create image object via intervention image.
        $img = Image::make( $_FILES['file']['tmp_name']  );

        // new name of the uploaded image.
        $imgName = $media->randomName();

        // save the image
        $img->save( $media->imagePath( $imgName ) );

        // original file name
        $input['filename'] =  Input::get('flowFilename');

        $input['imageName'] = $imgName;

        // file mime type
        $input['mimeType'] = $img->mime();

        // save to the database.
        $attachment = $this->mediaRepo->store( $input );

        // resize
        $this->mediaRepo->resizeImage( $attachment );

        // return response.
        echo json_encode( $attachment);
    }

    // query the items selected by the modal and return a response
    public function ajaxGetItems(){
        $items = Input::get('items'); // get the array of item ids.

        return Attachment::whereIn('id', $items)->get()->toJson();
    }


}