<?php
    if (isset($_REQUEST['producto'])){

        $_SESSION['vista']=$vistas['listaProd'];
        $_SESSION['controlador']=$controladores['producto'];
        require_once($_SESSION['controlador']);
    }
?>