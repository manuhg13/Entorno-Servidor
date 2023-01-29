<?
    if (isset($_REQUEST['ventas'])) {
        $ventas=VentasDAO::findAll();
    }
?>