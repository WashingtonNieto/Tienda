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
        
        require_once 'views/producto/crear.ph';
    }
    
    public function save(){
             Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
            //Guardar la categoria
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }
        header("Location:".base_url."categoria/index");   
    }
}
