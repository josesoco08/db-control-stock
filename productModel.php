<?php
require_once 'config/config.php';

class ProductModel { 
    private $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", 
            MYSQL_USER, MYSQL_PASS
        );
    }

    function getProducts() {
        $query = $this->db->prepare("SELECT * FROM producto");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); // Obtiene los productos como objetos
    }

    function getProductById($id) {
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_producto = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ); // Devuelve un solo producto
    }
}
