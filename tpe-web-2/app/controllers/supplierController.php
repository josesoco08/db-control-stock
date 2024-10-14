<?php
require_once 'app/models/supplierModel.php';
require_once 'app/views/supplierView.php';

class SupplierController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new SupplierModel();
        $this->view = new SupplierView();
    }

    function viewSupplier($supplier) {
        echo '<form method="GET" action="router.php">'; 
        echo '<li>' . htmlspecialchars($supplier->Nombre_proveedor) . '</li>';
        echo '<input type="hidden" name="action" value="supplier/' . htmlspecialchars($supplier->id_proveedor) . '">'; 
        echo '<button type="submit">Ver Detalle</button>';
        echo '</form>';
    }

    public function detailSupplier($id) {
        if ($id === null) {
            echo "No se especificó el ID del proveedor.";
        } else {
            $products = $this->model->getSupplierById($id);
            if ($products) {
                $this->view->suppierDetailView($products);
            } else {
                echo 'Proveedor no encontrado o no tiene productos.';
            }
        }
    }
}
