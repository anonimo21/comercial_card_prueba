<?php
    include_once 'Controllers/ProductoController.php';
    include_once 'Config/Conexion.php';
    include_once 'Services/meowfacts.php';
    include_once 'Services/uselessfacts.php';

    $regProducto = new ProductoController();
    if(!isset($_REQUEST['c'])){
        $regProducto->index();
    }else{
        $action = $_REQUEST['c'];
        call_user_func(array($regProducto, $action));
    }
?>