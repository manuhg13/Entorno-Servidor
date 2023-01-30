<?
    if (isset($_REQUEST['ventas'])) {
        $ventas=VentasDAO::findAll();
    }elseif (isset($_REQUEST['eliminar'])) {
        VentasDAO::delete($_REQUEST['idVenta']);
    }elseif (isset($_REQUEST['editar'])){
        $_SESSION['vista']=$vistas['ventas'];
    }elseif (isset($_REQUEST['guardar'])) {
        $venta=VentasDAO::findById($_REQUEST['idVenta']);
        
    }
?>