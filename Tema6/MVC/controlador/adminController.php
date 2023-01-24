<?php
    if (isset($_REQUEST['admProducto'])){

        $_SESSION['vista']=$vistas['listaProd'];
        $_SESSION['controlador']=$controladores['producto'];
        require_once($_SESSION['controlador']);
    }
?>