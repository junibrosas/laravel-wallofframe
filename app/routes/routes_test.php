<?php
Route::get('test', function(){
    for($i = 0; $i < 100; $i++){
        $number = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        echo $number . '<br>';
    }

});
