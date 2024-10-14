<?php
class SupplierView {
    public function suppierDetailView($products) {
        include 'app/views/template/header.php';
        if ($products) {
            echo '<ul>';
            foreach ($products as $product) {

                echo "<a href='router.php?action=home'>Volver</a>"; // Enlace para volver
                echo '<li>Nombre: ' . htmlspecialchars($product->Nombre_producto) . '</li>';
                echo '<li>Categoría: ' . htmlspecialchars($product->categoria) . '</li>';
                echo '<li>Cantidad: ' . htmlspecialchars($product->cantidad) . '</li>';
                echo '<li>Talle: ' . htmlspecialchars($product->talle) . '</li>';
                echo '<li>Valor: ' . htmlspecialchars($product->valor) . '</li>';
              
            }
            echo '</ul>';
        } else {
            echo '<p>No hay productos para este proveedor.</p>';
        }
        include 'app/views/template/footer.php';       
    }

}
