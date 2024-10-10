<?php

require_once 'config/config.php';
class ProductModel { 
    private $db;
    public function __construct() {
        $this->db = new PDO(
                        "mysql:host=".MYSQL_HOST .
                        ";dbname=".MYSQL_DB.";charset=utf8", 
                        MYSQL_USER, MYSQL_PASS);
                        $this->obtenerTablaProd();
    }

    public function obtenerTablaProd() {
        $query = $this->db->prepare("SELECT * FROM proveedor");
        $query->execute();
        $query->fetchAll(PDO::FETCH_OBJ);
   }

   function getProducts(){
    $query = $this->db->prepare("SELECT * FROM producto");
    $query->execute();
    // tasks es un arreglo de objeto
    $products = $query->fetchAll(PDO::FETCH_OBJ);
    return $products;

   }

}

?>