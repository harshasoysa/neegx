<?php


function gloabal_validate_input($arr){   
    
    $output=array(); 
    
    foreach ($arr as $key => $value){
        
        $key=trim($key); 
        $key=htmlspecialchars($key,ENT_QUOTES);

        $value=trim($value); 
        $value=htmlspecialchars($value,ENT_QUOTES);

        $output[$key] = $value;
    }

    return $output;
}

function request(){
    return new \Neegx\Foundation\HttpRequest\HttpRequest();
}

function get_routes(){

}

function tpl($tpl)
{
    
    echo $tpl;
}

