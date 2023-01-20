<?
    if(isset($_REQUEST['idProducto'])){
        $_SESSION['producto']=$_REQUEST['idProducto'];
    }
    $producto=ProductoDAO::findById($_SESSION['producto']);
?>