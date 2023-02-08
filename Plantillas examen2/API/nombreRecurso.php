<?
    
    require_once './config/configuracion.php';
    
    $recurso=ControladorPadre::recurso(); 

    if($recurso){
        if ($recurso[1]=='nombreRecurso') {
            $controlador= new RecursoControlador();
            $controlador->controlar();
        }
    }


?>