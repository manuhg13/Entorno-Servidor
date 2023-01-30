<?
    if (isset($_REQUEST['editar'])){
        $_SESSION['accion']='editar';
        $_SESSION['producto']=$_REQUEST['idProducto'];
        $_SESSION['vista']=$vistas['editarProductos'];
        $_SESSION['controlador']=$controladores['editarProductos'];
    }elseif (isset($_REQUEST['aumetar'])) {
        $_SESSION['producto']=$_REQUEST['idProducto'];
        $producto=ProductoDAO::findById($_SESSION['producto']);
        $producto->stock=($producto->stock)+$_REQUEST['cantidad'];
        ProductoDAO::update($producto);
        $nStock=new Albaran(null,date('Y-m-d'),$_SESSION['producto'],$_REQUEST['cantidad'],$_SESSION['user']);
        AlbaranDAO::insert($nStock);
    }elseif (isset($_REQUEST['nuevo'])) {
        $_SESSION['accion']='nuevo';
        $_SESSION['vista']=$vistas['editarProducto'];
        $_SESSION['controlador']=$controladores['editarProducto'];
    }elseif(isset($_REQUEST['almacen'])){
        $lista= ProductoDAO::findAll();
        $albaran=AlbaranDAO::findAll();
    }elseif (isset($_REQUEST['modificar'])) {
        $_SESSION['albaran']=$_REQUEST['idAlbaran'];
        $_SESSION['vista']=$vistas['editarAlbaran'];
        $_SESSION['controlador']=$controlador['editarAlbaran'];
    }elseif (isset($_REQUEST['eliminar'])) {
        $_SESSION['albaran']=$_REQUEST['idAlbaran'];
        AlbaranDAO::delete($_SESSION['albaran']);
        $lista= ProductoDAO::findAll();
        $albaran=AlbaranDAO::findAll();
    }else{
        $lista= ProductoDAO::findAll();
        $albaran=AlbaranDAO::findAll();
    }


?>