<?php
require_once 'app/models/productModel.php';
require_once 'app/models/supplierModel.php'; 
require_once 'app/views/productView.php';

class ProductController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }
    function showHome() {
        // Obtiene los productos
        $products = $this->model->getProducts(); 
        // Obtiene los proveedores
        $supplierModel = new SupplierModel();
        $suppliers = $supplierModel->getSupplier(); 
        // Pasa los productos y proveedores a la vista
        $this->view->HomeViews($products, $suppliers);
    }

    function detailProduct($id) {
        if ($id === null) {
            echo "No se especificó un id de producto";
        } else {
            $product = $this->model->getProductById($id);
            if ($product) {
                $this->view->ProductDetailView($product);
            } else {
                echo 'Producto no encontrado';
            }
        }
    }
}
