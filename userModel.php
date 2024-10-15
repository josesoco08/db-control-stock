<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO(
                              "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", 
                               MYSQL_USER, MYSQL_PASS
        );
    }

    //busca en la tabla usuario un usser con el nombre especificado
    public function getUser($username) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}