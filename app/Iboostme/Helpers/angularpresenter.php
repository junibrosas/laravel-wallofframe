<?php
function ngTotalAmount( $total_amount, $withSymbol = true ){
    $symbol = "main.outCurrency + ' ' ";
    if( $withSymbol == false ){
        $symbol = "' '";
    }
    return "<span ng-cloak>{{ main.currencyConvert(".$total_amount.", main.inCurrency, main.outCurrency ) | currency : ".$symbol." }}</span>";
}