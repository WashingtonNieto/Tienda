<?php

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;
    
    
    public function __construct(){
        $this->db = Database::connect();
    }
    public function getId() {
        return $this->id;
    }

    public function getCategoria_id() {
        return $this->categoria_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setCategoria_id($categoria_id): void {
        $this->categoria_id = $categoria_id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setPrecio($precio): void {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setStock($stock): void {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setOferta($oferta): void {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }
    
    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }

    
    public function save(){
        $sql = "INSERT INTO productos VALUES(NULL, '{$this->getCategoria_id()}','{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},null, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);

        echo $this->db->error;
        //var_dump($sql);
        //die();
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
}

    