<?php

// Generates a unique ID. Used to generate tracking number.
function generateUniqueId(){
    $uid = '';
    for($i = 0; $i < 25; $i++){
        $uid .= chr(rand(65, 90));
    }
    return $uid;
}

// clone an object to specific times. Returns an array of cloned objects
function cloneObject($object, $times){
    $clones = array();
    if(is_object($object)){
        for($i = 0; $i < $times; $i++){
            $clones[] = $object;
        }
    }

    return $clones;
}

