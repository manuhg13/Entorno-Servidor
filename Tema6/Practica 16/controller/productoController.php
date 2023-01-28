<?
    if (isset($_REQUEST['editar'])){
        $_SESSION['producto']=$_REQUEST['idProducto'];
        $_SESSION['vista']=$vistas['editarProductos'];
        $_SESSION['controlador']=$controlador['editarProductos'];
    }elseif (isset($_REQUEST['aumetar'])) {
        $_SESSION['producto']=$_REQUEST['idProducto'];
        $producto=ProductoDAO::findById($_SESSION['producto']);
        $producto->stock=($producto->stock)+$_REQUEST['cantidad'];
        ProductoDAO::update($producto);
    }elseif (isset($_REQUEST['nuevo'])) {
        $_SESSION['accion']='nuevo';
        $_SESSION['vista']=$vistas['editarProductos'];
        $_SESSION['controlador']=$controlador['editarProductos'];
    }


?>