<?php
    require_once("Modelo/Productos_modelo.php");

    $productos = new Productos_model();
    
    $matrizProductos = $productos->get_productos();

    require_once("Vista/Productos_view.php");
?>