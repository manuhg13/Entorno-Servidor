<?
    require_once('./config/configuracion.php');

    session_start();

    
    if (isset($_REQUEST['logout'])) {   
        session_destroy();
        $_SESSION['controlador']= $controladores['login'];
        $_SESSION['vista']= $vistas['login'];
        $_SESSION['pagina']= 'Login';
        header('Location: index.php');

    //Otras opciones
    }else{
        //Si no tiene página se le asigna la del Login como principal
        if (!isset($_SESSION['pagina'])){
            $_SESSION['pagina']='Login';
            $_SESSION['controlador']= $controladores['login'];
            $_SESSION['vista']=$vistas['login'];
            require_once $_SESSION['controlador'];
        
        }else{
            require_once $_SESSION['controlador'];
    
        }

    }

    //Y por último siempre se precisará de nuestro layout 
    require_once('./view/layout.php');



?>