<?php
require_once 'app/controllers/productController.php';
require_once 'app/controllers/supplierController.php';
require_once 'app/controllers/loginController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Iniciar sesión
session_start();

// Acciones
$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// Controlador de acción
switch ($params[0]) {
    case 'home':
        $controller = new ProductController();
        $controller->showHome();
        break;
    case 'productDetail':
        $controller = new ProductController();
        $controller->detailProduct($params[1]);
        break;
    case 'supplierDetail':
        $controller = new SupplierController();
        $controller->detailSupplier($params[1]);
        break;
    case 'Login':
        $controller = new LoginController();
        $controller->login();
        break;

    case 'showLogin':
        $controller = new LoginController();
        $controller->showLogin();
        break;

    case 'Logout':
        $controller = new LoginController();
        $controller->logout();
        break;

    // Acciones restringidas a administradores
    case 'listProduct':
    case 'listSupplier':
    case 'viewForm':
    case 'add':
    case 'editProduct':
    case 'updateProduct':
    case 'deleteProduct':
    case 'viewFormSupplier':
    case 'addSupplier':
    case 'editSupplier':
    case 'updateSupplier':
    case 'deleteSupplier':
        $controller = new ProductController();
        $controllerSupplier = new SupplierController();
        if ($_SESSION['is_admin'] ?? false) { // Verificación de permisos
            switch ($params[0]) {
                case 'listProduct': 
                $controller->listProductController(); 
                break;
                case 'listSupplier':
                $controllerSupplier->listSuppliersController();
                break;
                case 'viewForm':
                    $controller->viewFormController();
                    break;
                case 'add':
                    $controller->addProduct();
                    break;
                case 'editProduct':
                    if (isset($params[1])) {
                        $controller->editProduct($params[1]);
                    } else {
                        echo "ID del producto no especificado";
                    }
                    break;
                case 'updateProduct':
                    $controller->updateProduct();
                    break;
                case 'deleteProduct':
                    if (isset($params[1])) {
                        $controller->removeProduct($params[1]);
                    } else {
                        echo "ID del producto no especificado";
                    }
                    break;
                //proveedor
                case 'viewFormSupplier':
                    $controllerSupplier->formViewSupplier();
                    break;
                case 'addSupplier':
                    $controllerSupplier->addSupplier();
                    break;
               case 'editSupplier':
                if(isset($params[1])){
                $controllerSupplier->editSupplierController($params[1]);
                }else{
                    echo "ID no encontrado";
                }
                break;
                case 'updateSupplier':
                    $controllerSupplier->updateSupplier();
                    break;
                case 'deleteSupplier':
                    if (isset($params[1])) {
                        $controllerSupplier->removeSupplier($params[1]);
                    } else {
                        echo "ID del producto no especificado";
                    }
                    break;
            }
        } else {
            echo "Acceso denegado: necesita permisos de administrador.";
        }
        break;

    default:
        echo "404 not found"; // Ruta no encontrada
        break;
}