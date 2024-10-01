<?php
class ProveedorModel { 
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_web_2;charset=utf8', 'root', '');
    }

    public function obtenerProveedores() {
    $query = $this->db->prepare("SELECT * FROM proveedor");
    $query->execute();
    $query->fetchAll(PDO::FETCH_OBJ);
    }
}


?>