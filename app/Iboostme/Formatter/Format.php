<?php
namespace Iboostme\Formatter;
interface Format {

    // format a single object
    public function format( $item );

    // format multiple objects
    public function bulkFormat( $list );
} 