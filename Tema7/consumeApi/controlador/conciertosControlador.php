<?
    require_once '../peticiones/curl.php';

    if (isset($_REQUEST['accion'])) {
       if ($_REQUEST['accion']=='listar') {
        $lista=get();
        require '../vista/listar.php';
       }
    }
    if ($_REQUEST['accion']=='Guardar') {
       if (post($_REQUEST['grupo'],$_REQUEST['fecha'],$_REQUEST['precio'],$_REQUEST['lugar'])){
          $lista=get();
          require '../vista/listar.php';
       }else{
         require '../vistas/formInsert.php';
       }
    }
?>