<?
    if ($_REQUEST['op']=='mod'){
        header('Location: ../modificar.php?op='.$_REQUEST['op'].'&clave='.$_REQUEST['clave']);
    }elseif ($_REQUEST['op']=='ins') {
        header('Location: ../modificar.php?op='.$_REQUEST['op']);
    }

?>