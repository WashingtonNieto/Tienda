<?php

require_once 'models/producto.php';

class ProductoController{
    public function index(){
        //renderizar vista de producto
        require_once 'views/producto/destacados.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        
        //creamos una variable producto
        //que es una instancia de la clase Producto
        //creo el objeto para poder acceder al select de los productos
        //el resultado se guarda en $productos
        //los cuales se le pasan a la vista gestion.php
        $producto = new Producto();
        $productos = $producto->getAll();
        
        
        require_once 'views/producto/gestion.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }
    
    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
            //var_dump($_POST);
            //die();
            //Guardar la producto
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion']: false;
            $precio = isset($_POST['precio']) ? $_POST['precio']: false;
            $stock = isset($_POST['stock']) ? $_POST['stock']: false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria']: false;
           
            if($nombre && $descripcion && $precio && $stock && $categoria){
               $producto = new Producto();
               $producto->setNombre($nombre);
               $producto->setDescripcion($descripcion);
               $producto->setPrecio($precio);
               $producto->setStock($stock);
               $producto->setCategoria_id($categoria);
               
               //Guardar la imagen
               $file = $_FILES['imagen'];
               $filename = $file['name'];
               $mimetype = $file['type'];
               
               //var_dump($file);
               //die();
               
               if($mimetype == "image/jpg" ||$mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/git" ){
                   if(!is_dir('uploads/images')){
                       mkdir('uploads/images',0777,true);
                   }
                   move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                   $producto->setImagen($filename);
               }
                   
               
               $save = $producto->save();
               if($save){
                   $_SESSION['producto'] = "complete";
               }else{
                   $_SESSION['producto'] = "failed";
               }
            }else{
                $_SESSION['producto'] = "failed";
            }
        }else{
            $_SESSION['producto'] = "failed";
        }
        header("Location:".base_url."producto/gestion");   
    }
}
