<?php

function controllers_autoload($classname){
    $env = getenv("ENVIRONMENT");
    
    $controller = substr($classname, -10);
    $clase=substr($classname,0, -10);
    
    $classname = ucfirst($clase).ucfirst($controller);
    
    /*
    var_dump(strlen($sinController));
    var_dump(strlen($classname));
    var_dump(ucfirst($controller));
    var_dump(ucfirst($clase));
    var_dump(ucfirst($classname));
    die();
    */
    if($env == "produccion"){
        //cargar controladores en produccion
        require_once 'controllers/'.$classname.'.php';
   
        /*
        if ($classname == "usuariocontroller"){
            require_once 'controllers/UsuarioController'.'.php';
        }elseif ($classname == "categoriacontroller"){
            require_once 'controllers/CategoriaController'.'.php';
        }elseif ($classname == "Productocontroller"){
            require_once 'controllers/ProductoController'.'.php';
        }else{
            require_once 'controllers/'. ucfirst($classname).'.php';
        }
        
        */
    }else{
        //cargar controladores en local

        include 'controllers/'.$classname.'.php';
    }
}

spl_autoload_register('controllers_autoload');