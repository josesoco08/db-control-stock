<?php
class ProductView {
    function HomeViews($products, $suppliers) {
        include 'app/views/template/header.php'; // Encabezado

        echo '<h1>Lista de Productos</h1>';
        echo '<ul>';
        foreach ($products as $product) {
            echo '<li>' . htmlspecialchars($product->Nombre_producto) . ' - Categoría: ' . htmlspecialchars($product->categoria) . '</li>'; // Mostrar categoría
            echo '<form method="GET" action="router.php">'; 
            echo '<input type="hidden" name="action" value="details">'; 
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($product->id_producto) . '">';
            echo '<button type="submit">Ver Detalle</button>';
            echo '</form>';
        }
        echo '</ul>';
    // Mostrar lista de proveedores
    echo '<h1>Lista de Proveedores</h1>';
    echo '<ul>';
    foreach ($suppliers as $supplier) {
        echo '<li>' . htmlspecialchars($supplier->Nombre_proveedor) . '</li>';
        echo '<form method="GET" action="router.php">'; 
        echo '<input type="hidden" name="action" value="supplier/' . htmlspecialchars($supplier->id_proveedor) . '">';
        echo '<button type="submit">Ver Detalle</button>';
        echo '</form>';
    }
    echo '</ul>';

    }

    function ProductDetailView($product) {
        include 'app/views/template/header.php';
        echo "<a href='router.php?action=home'>Volver</a>"; // Enlace para volver
        echo '<h1>Detalle del Producto</h1>';
        echo '<p>Nombre: ' . htmlspecialchars($product->Nombre_producto) . '</p>';
        echo '<p>Categoría: ' . htmlspecialchars($product->categoria) . '</p>';
        echo '<p>Cantidad: ' . htmlspecialchars($product->cantidad) . '</p>';
        echo '<p>Talle: ' . htmlspecialchars($product->talle) . '</p>';
        echo '<p>Valor: ' . htmlspecialchars($product->valor) . '</p>';
        include 'app/views/template/footer.php'; // Pie de página
    }
}
?>