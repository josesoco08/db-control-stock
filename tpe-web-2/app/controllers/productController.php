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
            $product = $this->model->getProductById($id);
            if ($product) {
                $this->view->ProductDetailView($product);
            } else {
                echo 'Producto no encontrado';
            }
        }
    
    public function listProductController() {
        $productos = $this->model->listarProductos();
        $this->view->listView($productos);
    }


    public function viewFormController() {
        $this->view->formView();
    }

    public function addProduct() {
        // Obtener los datos del formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre_prod = $_POST["Nombre_producto"] ?? null;
        $id_prov = $_POST["id_proveedor_fk"] ?? null;
        $categoria = $_POST["categoria"] ?? null;
        $cantidad = $_POST["cantidad"] ?? null;
        $talle = $_POST["talle"] ?? null;
        $valor = $_POST["valor"] ?? null;
    // Inicializa el mensaje
       
        if (!empty($nombre_prod) && !empty($id_prov) && !empty($categoria) && !empty($cantidad) && !empty($talle) && !empty($valor)) {
            // Llamar al modelo para insertar el producto
            $this->model->insertProductsModel($nombre_prod, $id_prov, $categoria, $cantidad, $talle, $valor);
            $this->view->addProductView();
        } else {
            echo "Por favor, complete todos los campos del formulario.";
        }
    }
          header('Location: ' . BASE_URL . 'listProduct');
    }
  
    function editProduct($id) {
        $row = $this->model->editProductos($id);
        if ($row) {
            $this->view->editProductView($row);
        } else {
            header('Location: ' . BASE_URL . 'listProduct');
    }
}

    function updateProduct() {
        // Obtener los datos enviados por POST
        $id = $_POST['id_producto'];
        $nombre_producto = $_POST['Nombre_producto'];
        $id_proveedor_fk = $_POST['id_proveedor_fk'];
        $categoria = $_POST['categoria'];
        $cantidad = $_POST['cantidad'];
        $talle = $_POST['talle'];
        $valor = $_POST['valor'];
        
        // Actualizar el producto en la base de datos
        $this->model->updateProduct($id, $nombre_producto, $id_proveedor_fk, $categoria, $cantidad, $talle, $valor);
        header('Location: ' . BASE_URL . 'listProduct');
    }
    
    function removeProduct($id) {
        $result = $this->model->deleteProduct($id);
        header('Location: ' . BASE_URL . 'listProduct');
        }
    }
    
