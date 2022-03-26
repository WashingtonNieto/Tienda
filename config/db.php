<?php

class Database{
    public static function connect(){
        //local
        $db = new mysqli('localhost','root','','tienda');
        //remoto
        //$db = new mysqli('localhost','u762499790_admin_tienda','EileenRodriguez2018','u762499790_tienda');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}