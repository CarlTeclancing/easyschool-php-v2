<?php

function verify_input(mixed $value, string $error){
   $query = http_build_query(['error'=> $error]);

    if(!isset($value) || empty($value) && $value == ""){
       return header('location: http://localhost/easyschool/register.php'. '?' . $query);
    
    }
}
