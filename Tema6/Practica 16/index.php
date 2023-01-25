<?
    require_once('./config/configuracion.php');
    session_start();

    if (isset($_REQUEST['home'])){
        $_SESSION['controlador']= $controladores['home'];
        $_SESSION['vista']= $vistas['home'];
        $_SESSION['pagina']= 'home';
        require_once $_SESSION['controlador'];
    }elseif (isset($_REQUEST['logout'])) {
        session_destroy();
        $_SESSION['controlador']= $controladores['home'];
        $_SESSION['vista']= $vistas['home'];
        $_SESSION['pagina']= 'home';
        header('Location: index.php');

    }else{

        if (!isset($_SESSION['pagina'])){
            $_SESSION['vista']=$vistas['home'];
            $_SESSION['controlador']= $controladores['home'];
            $_SESSION['pagina']= 'home';
            require_once $_SESSION['controlador'];

        }elseif (isset($_REQUEST['login'])){
            $_SESSION['pagina']='login';
            $_SESSION['controlador']= $controladores['login'];
            $_SESSION['vista']=$vistas['login'];
        }
    }

?>