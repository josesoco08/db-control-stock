<?php
require_once 'app/models/productModel.php';
require_once 'app/models/supplierModel.php';
require_once 'app/views/productView.php';
require_once 'app/views/supplierView.php';

class ProveedorController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new SupplierModel();
        $this->view = new SupplierView();
    }
}

?>