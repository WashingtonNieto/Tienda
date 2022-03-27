<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController{
    
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        require_once 'views/categoria/index.php';
    }
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            //Conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            
            //Conseguir producto
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            //var_dump($_GET['id']);
        }
        require_once 'views/categoria/ver.php';
    }
    
    public function gestion() {
        Utils::isAdmin();

        //creamos una variable producto
        //que es una instancia de la clase Producto
        //creo el objeto para poder acceder al select de los productos
        //el resultado se guarda en $productos
        //los cuales se le pasan a la vista gestion.php
        $categoria = new Categoria();
        $Categorias = $categoria->getAll();

        require_once 'views/categoria/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
            //Guardar la categoria
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }
        if(!headers_sent()){
            header("Location:".base_url."categoria/index");
        }        
    }
}
