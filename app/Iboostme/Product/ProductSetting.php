<?php
namespace Iboostme\Product;


class ProductSetting {
    public static function colorSelection(){
        return [
            ['id' => '', 'name' => 'Default Color', 'color' => ''],
            ['id' => 'A7A4A4', 'name' => 'Grey', 'color' => 'A7A4A4'],
            ['id' => '252525', 'name' => 'Dark', 'color' => '252525'],
            ['id' => 'FDF8F8', 'name' => 'Light', 'color' => 'FDF8F8'],
        ];
    }
} 