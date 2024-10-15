<?php
require_once 'config/config.php';

class SupplierModel { 
    private $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", 
            MYSQL_USER, MYSQL_PASS
        );
    }

    public function getSupplier() {
        $query = $this->db->prepare("SELECT * FROM proveedor");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSupplierById($id_proveedor) {
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_proveedor_fk = ?");
        $query->execute([$id_proveedor]);
        return $query->fetchAll(PDO::FETCH_OBJ); // Devuelve los productos del proveedor
    }
}
