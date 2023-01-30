<?
    if (isset($_REQUEST['ventas'])) {
        $ventas=VentasDAO::findAll();
    }elseif (isset($_REQUEST['guardar'])) {
        
    }
?>