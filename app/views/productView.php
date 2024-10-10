<?php
class ProductView {
    function showProducts($products) {
        include 'app/views/template/header.php';

        // Definir los nombres de las columnas
        $columns = ['Nombre del Producto', 'Proveedor', 'Categoría', 'Cantidad', 'Talle', 'Valor'];

        // Inicio de la tabla
        echo '<table class="product-table">';
        echo '<thead><tr>';
        foreach ($columns as $column) {
            echo "<th>$column</th>";
        }
        echo '</tr></thead>';
        echo '<tbody>';

        // Iterar sobre los productos
        foreach ($products as $product) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($product->Nombre_producto) . '</td>';
            echo '<td>' . htmlspecialchars($product->id_proveedor_fk) . '</td>';
            echo '<td>' . htmlspecialchars($product->categoria) . '</td>';
            echo '<td>' . htmlspecialchars($product->cantidad) . '</td>';
            echo '<td>' . htmlspecialchars($product->talle) . '</td>';
            echo '<td>' . htmlspecialchars($product->valor) . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';

        include 'app/views/template/footer.php';
    }
}
?>
