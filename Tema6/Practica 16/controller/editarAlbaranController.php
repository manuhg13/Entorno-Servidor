<?
    if (isset($_REQUEST['guardar'])){
        if (isset($_SESSION['albError'])){
            unset($_SESSION['albError']);
        }
        if (validarAlbaran()){
            $registro=AlbaranDAO::findById($_SESSION['albaran']);
            $registro->fechaAlbaran=$_REQUEST['fechaAlbaran'];
            $registro->cantidad=(int)$_REQUEST['cantidad'];
            $registro->usuario=$_REQUEST['usuario'];

            if(AlbaranDAO::update($registro)){
                $_SESSION['controlador']=$controladores['producto'];
                $_SESSION['vista']=$vistas['almacen'];
                $lista= ProductoDAO::findAll();
                $albaran=AlbaranDAO::findAll();
            }
        }
    }else{
        $_SESSION['albaran']=$_REQUEST['idAlbaran'];
        $registro=AlbaranDAO::findById($_SESSION['albaran']);
    }
?>