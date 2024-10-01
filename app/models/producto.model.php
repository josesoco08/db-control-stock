<?php
class ProductorModel { 
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_web_2;charset=utf8', 'root', '');
    }

    public function obtenerProducto() {
    $query = $this->db->prepare("SELECT * FROM producto");
    $query->execute();
    $query->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
