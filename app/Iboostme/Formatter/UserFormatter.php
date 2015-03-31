<?php
namespace Iboostme\Formatter;
use Iboostme\Formatter\Format;

class UserFormatter implements Format {
    public function format( $item ){
        $result  = [
            'id' => $item->id,
            'name' => $item->present()->name,
        ];

        return $result;

    }

    public function bulkFormat( $list ){
        $result = array();
        if(count($list) > 0){
            foreach($list as $i => $item){
                $result[] = $this->format($item);
            }
        }
        return $result;
    }
} 