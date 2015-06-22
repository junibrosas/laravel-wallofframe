<?php
namespace Iboostme\Media;

class MediaConfigImage extends MediaConfig{
    public function sizes(){
        $size['square'] = array('width' => '300', 'height' => '300' );
        $size['horizontal'] = array('width' => '330', 'height' => '240' );
        $size['vertical'] = array('width' => '240', 'height' => '330' );

        return $size;
    }
} 