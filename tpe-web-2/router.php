<?php
require_once 'app/controllers/productController.php';
require_once 'app/controllers/supplierController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // Acción por defecto
if (!empty($_GET['action'])) { // Si viene definida la reemplazamos
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new ProductController();
        $controller->showHome();
        break;
    case 'details':
        $controller = new ProductController();
        $controller->detailProduct($_GET['id']); 
        break;
    case 'supplier':
        $controller = new SupplierController();
        if (isset($params[1])) {
            $controller->detailSupplier($params[1]);
        }
        break;
    default:
        echo "404 not found";
        break;
}
