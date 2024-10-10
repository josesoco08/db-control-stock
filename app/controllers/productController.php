<?php
require_once 'app/models/productModel.php';
require_once 'app/models/supplierModel.php';
require_once 'app/views/productView.php';
require_once 'app/views/supplierView.php';

class ProductController {
    private $model;
    private $view;


function __construct(){
    $this->model = new ProductModel();
    $this->view = new ProductView();
} 
   
function showHome(){
    $products = $this->model->getProducts();

    $this->view->showProducts($products);
}

}