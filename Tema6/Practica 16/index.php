<?
    require_once('./config/configuracion.php');

    if (isset($_REQUEST['home'])){
        $_SESSION['controlador']= $controladores['home'];
        $_SESSION['vista']= $vistas['home'];
        $_SESSION['pagina']= 'home';
        require_once $_SESSION['controlador'];
    }

?>