<?php 
function displyData ($key){
    
    printf ("value ='%s'",$key);
}



function scramblerData($orginalData , $key){
    $orginalKey = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $data ='';
    $length =strlen($orginalData);
    for ($i=0; $i < $length; $i++) { 
       $currentKey = $orginalData[$i];
       $position = strpos($orginalKey , $currentKey);
       if ($position !== false) {
        $data .= $key[$position];
       }else{
        $data .= $currentKey ;
       }
    }

    return $data ;
}


function decodeData($orginalData , $key){
    $orginalKey = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $data ='';
    $length =strlen($orginalData);
    for ($i=0; $i < $length; $i++) { 
       $currentKey = $orginalData[$i];
       $position = strpos($key , $currentKey);
       if ($position !== false) {
        $data .= $orginalKey[$position];
       }else{
        $data .= $currentKey ;
       }
    }

    return $data ;
}