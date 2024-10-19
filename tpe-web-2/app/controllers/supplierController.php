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
    //esto esta mal
    function viewSupplier($supplier) {
        echo '<form method="GET" action="router.php">'; 
        echo '<li>' . htmlspecialchars($supplier->Nombre_proveedor) . '</li>';
        echo '<input type="hidden" name="action" value="supplier/' . htmlspecialchars($supplier->id_proveedor) . '">'; 
        echo '<button type="submit">Ver Detalle</button>';
        echo '</form>';
    }

    public function detailSupplier($id) {
            $products = $this->model->getSupplierById($id);
            if ($products) {
                $this->view->suppierDetailView($products);
            } else {
                echo 'Proveedor no encontrado o no tiene productos.';
            }
        }
    
    public function listSuppliersController() {
        $suppliers = $this->model->listSuppliers();
        $this->view->listViewSuppliers($suppliers);
    }
    
    //ver form proveedores
    public function formViewSupplier() {
        $this->view->formSupplier();
    }

public function addSupplier() {
    // Verifica si los datos han sido enviados
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre_prov = $_POST["Nombre_proveedor"]?? null;
        $pago = $_POST["medio_de_pago"]?? null;
        $telefono = $_POST["telefono"]?? null;

         // Verificar que todos los campos están completos
         if (!empty($nombre_prov) && !empty($pago) && !empty($telefono)) {
            // Llamar al modelo para insertar el proveedor
         $this->model->insertSupplierModel($nombre_prov, $pago, $telefono);
            
        // Pasar el mensaje a la vista
        $this->view->addSupplierView();
        } else {
                echo "Método de solicitud no válido.";
            }
            }
            header('Location: ' . BASE_URL . 'listSupplier');
}
    function editSupplierController($id){
        $row = $this->model->editSupplier($id);
        if ($row) {
            $this->view->editSupplierView($row);
        } else {
            echo "Producto no encontrado."; 
            header('Location: ' . BASE_URL . 'listSupplier');
    }
}

function updateSupplier(){
    $id = $_POST['id_proveedor'];
    $nombre_proveedor = $_POST['nombre_proveedor'];
    $medio_de_pago = $_POST['medio_de_pago'];
    $telefono = $_POST['telefono'];
    $this->model->updateSupplier($id,$nombre_proveedor, $medio_de_pago, $telefono);
    header('Location: ' . BASE_URL . 'listSupplier');
}
    
function removeSupplier($id) {
    $result = $this->model->deleteSupplier($id);
    header('Location: ' . BASE_URL . 'listSupplier');
    }

}
