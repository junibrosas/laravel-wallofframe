<?php
namespace Iboostme\Formatter;
use Iboostme\Formatter\Format;

class TransactionFormatter implements Format {
    public function format( $item ){
        $result  = [
            'id' => $item->id,
            'url' => $item->present()->orderUrl,
            'tracking_number' => $item->tracking_number,
            'products' => $item->products,
            'created_at' => $item->created_at,
            'buyer' => $item->user->present()->name,
            'date' => $item->created_at->diffForHumans(),
            'total_amount' => $item->present()->totalAmount,
            'payment_method' => $item->present()->paymentMethod,
            'status' => $item->present()->status,
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