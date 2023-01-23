<?
    require_once('./config/configuracion.php');

    if (isset($_REQUEST['logout'])) {
        session_destroy();
        $_SESSION['controlador']= $controladores['login'];
        $_SESSION['vista']= $vistas['login'];
        $_SESSION['pagina']= 'login';
        header('Location: index.php');

    }
    
    session_start();
    if (estaValidado() && !isset($_SESSION['pagina'])) {
        $_SESSION['vista']=$vistas['home'];
    }elseif ((!estaValidado() && !isset($_SESSION['pagina'])) || isset($_REQUEST['login'])) {
        $_SESSION['pagina']='login';
        $_SESSION['controlador']= $controladores['login'];
        $_SESSION['vista']=$vistas['login'];
    }elseif (isset($_SESSION['pagina'])) {
        if (esAdmin() && isset($_REQUEST['admProductos'])) {          
            $_SESSION['controlador']= $controladores['admin'];
            require_once($_SESSION['controlador']);
        }
        require_once($_SESSION['controlador']);
    }
    require_once('./vista/layout.php');
?>