<?
    if (isset($_REQUEST['ventas'])) {
        $ventas=VentasDAO::findAll();
    }elseif (isset($_REQUEST['eliminar'])) {
        $venta=VentasDAO::findById($_REQUEST['idVenta']);
    }
?>