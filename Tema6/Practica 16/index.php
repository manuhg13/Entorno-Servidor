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

        }elseif(isset($_SESSION['pagina'])){

            if (isset($_REQUEST['miperfil'])) {
                $_SESSION['accion']='ver';
                $usuario=UsuarioDAO::findById($_SESSION['user']);
                $_SESSION['vista']=$vistas['user'];
                require_once $_SESSION['controlador'];
            }elseif(isset($_REQUEST['tienda'])){
                $_SESSION['controlador']=$controladores['tienda'];
                $_SESSION['pagina']='tienda';
                $_SESSION['vista']=$vistas['tienda'];
                require_once $_SESSION['controlador'];
            }else{
                require_once $_SESSION['controlador'];
            }

        }
    }

    require_once('./view/layout.php');

?>