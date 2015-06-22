<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/19/2015
 * Time: 5:51 PM
 */

namespace Iboostme\Media;

use Illuminate\Support\Str;

class Media {

    // return the upload directory path for the uploads
    public function publicPath(){
        return  public_path('uploads/attachments');
    }

    // return the asset directory path.
    public function assetPath(){
        return asset('uploads/attachments');
    }

    // set a randomized filename.
    public function randomName(){
        return Str::random(20).'.jpg';
    }
    
    public function imagePath( $name ){
        return $this->publicPath() .'/'. $name;
    }

    // extract the filename and return only
    // the name of the file without extension.
    public function getName( $filename ){
        $explosion = explode('.', $filename);
        return $explosion[0];
    }

    public function resize(){

    }
}