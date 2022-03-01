<?php

function controllers_autoload($classname){
    $env = getenv("ENVIRONMENT");

    if($env == "produccion"){
        //cargar controladores en produccion
        require_once 'controllers/' . ucfirst($classname) . '.php';
        //include 'controllers/'.$classname.'.php';
    }else{
        //cargar controladores en local

        include 'controllers/'.$classname.'.php';
    }
}

spl_autoload_register('controllers_autoload');