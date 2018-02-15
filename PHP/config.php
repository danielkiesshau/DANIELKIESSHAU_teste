<?php

spl_autoload_register(function($class_name){
    $filename = "Modelos".DIRECTORY_SEPARATOR.$class_name.".php";
    echo $filename;
    if(file_exists($filename)){
        require_once($filename);
        
    }
    
});


?>