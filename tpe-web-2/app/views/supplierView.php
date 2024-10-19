
<?php
class SupplierView { 
    // Mostrar los productos de un proveedor específico
    public function suppierDetailView($products) {
        // Incluimos la plantilla de detalle del proveedor
        include "Template/supplier/supplier_detail.phtml";
    }
    function listViewSuppliers($suppliers){
        include 'Template/suppliersABM/listSupplier.phtml';
    }
    function formSupplier(){
        include 'Template/suppliersABM/formaddSupplier.phtml';
    }
    function addSupplierView() {
        include 'Template/suppliersABM/formaddSupplier.phtml';
     }
     function editSupplierView($row){
        include 'Template/suppliersABM/formEditSupplier.phtml';
     }
}