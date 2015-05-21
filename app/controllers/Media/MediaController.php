<?php namespace Media;
use Illuminate\Support\Facades\View;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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


        return View::make('media.media-upload', $this->data);
    }

    public function store(){
        $imgName = isset($_FILES['file']) ? $_FILES['file']['name'] : $_GET['flowFilename'];

        // create a new randomized image filename
        $randomFileName = Str::random(20).'.jpg';

        // create image object via intervention image.
        $img = Image::make( $_FILES['file']['tmp_name']  );

        // path of original image
        $tempDir = public_path('uploads/test');

        // resize image to fixed size
        $img->resize(300, 200);

        // save the image
        $img->save( $tempDir.'/'. $randomFileName );


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
}