<?
if (isset($_REQUEST['idProducto'])){
    $_SESSION['producto']=$_REQUEST['idProducto'];
    $producto=ProductoDAO::findById($_SESSION['producto']);
}if (isset($_REQUEST['guardar'])){
    if ( $_SESSION['accion']=='editar'){
        $producto=ProductoDAO::findById($_SESSION['producto']);
        $producto->precio=(float)$_REQUEST['precio'];
        $producto->descripcion=$_REQUEST['descripcion'];
        ProductoDAO::update($producto);
    }elseif ($_SESSION['accion']=='nuevo') {
        if (validarProducto()) {
            
        }
    }
}


?>