<?php namespace Iboostme\Media;

use Attachment;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class MediaRepository extends Media{

    public function resizeImage( Attachment $attachment ){

        // Define the sizes.
        $imageGenerateData['square'] = array('width' => '300', 'height' => '300' );
        $imageGenerateData['horizontal'] = array('width' => '330', 'height' => '240' );
        $imageGenerateData['vertical'] = array('width' => '240', 'height' => '330' );
        
        // create image object
        $img = Image::make( public_path('uploads/attachments/' . $attachment->filename ) );

        // generate thumbs
        foreach( $imageGenerateData as $type => $data ){
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
            $img->save($image_destination.$attachment->filename);
        }
    }

    // upload an image.
    /*public function uploadImage(){
        // create image object via intervention image.
        $img = Image::make( $_FILES['file']['tmp_name']  );

        // save the image
        $img->save( $media->imagePath() );
    }*/


    public function store( $input ){

        // save to the database.
        $attachment = new Attachment();
        $attachment->user_id = Auth::id();
        $attachment->url = $this->assetPath().'/'.$input['imageName'];
        $attachment->name = $this->getName( $input['filename'] );
        $attachment->filename = $input['imageName'];
        $attachment->mime_type = $input['mimeType'];

        $attachment->save();

        return $attachment;
    }

} 