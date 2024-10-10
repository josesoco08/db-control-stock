<?php
require_once 'app/controllers/supplierController.php';
require_once 'app/controllers/productController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['home'])) { // si viene definida la reemplazamos
    $action = $_GET['home'];
}
$params = explode('/', $action);
switch($params[0]){
    case 'home':
        $controller = new ProductController;
        $controller->showHome();
    case 'productos':
        //listado de productos
      /*  $controller = new ProductController;
        $controller = listarProduct();*/
        
}

?>