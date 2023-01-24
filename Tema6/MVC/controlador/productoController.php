<?
    if (isset($_REQUEST['borrar'])) {

        $_SESSION['producto']=$_REQUEST['idProducto'];
        $producto=ProductoDAO::delete($_SESSION['producto']);
        $lista= ProductoDAO::findAll();

    }elseif (isset($_REQUEST['editar'])){

        $_SESSION['producto']=$_REQUEST['idProducto'];
        $producto=ProductoDAO::findById($_SESSION['producto']);
        $_SESSION['vista']=$vistas['editarProductos'];

    }elseif(isset($_REQUEST['idProducto'])){

        $_SESSION['producto']=$_REQUEST['idProducto'];
        $producto=ProductoDAO::findById($_SESSION['producto']);
        $_SESSION['vista']=$vistas['verProducto'];

    }elseif (isset($_REQUEST['admProductos'])){
        
        $lista= ProductoDAO::findAll();
    }
?>