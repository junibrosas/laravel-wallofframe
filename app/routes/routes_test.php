<?php
Route::get('test', function(){
    trace(Cart::content());
});
