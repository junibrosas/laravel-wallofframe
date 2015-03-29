<?php
namespace Iboostme\Product\Border;

class FrameBorder {
    public function tabItems( $frames ){
        $data = array();
        $data['all'] = $frames;
        foreach($frames as $frame){
            if($frame->is_active){
                $data['active'][] = $frame;
            }

            if($frame->deleted_at){
                $data['trash'][] = $frame;
            }
        }

        return $data;
    }
} 