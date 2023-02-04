<?
    if (isset($_REQUEST['ventas'])) {
        $ventas=VentasDAO::findAll();
    }elseif (isset($_REQUEST['eliminar'])) {
        VentasDAO::delete($_REQUEST['idVenta']);
        $ventas=VentasDAO::findAll();
    }else{
        $ventas=VentasDAO::findAll();
    }
?>