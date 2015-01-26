<?php
function generateUniqueId(){
    $uid = '';
    for($i = 0; $i < 25; $i++){
        $uid .= chr(rand(65, 90));
    }
    return $uid;
}

