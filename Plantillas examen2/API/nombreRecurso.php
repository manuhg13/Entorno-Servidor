<?
    
    require_once './config/configuracion.php';
    
    $recurso=FatherController::recurso(); 

    if($recurso){
        if ($recurso[1]=='nombreRecurso') {
            $controlador= new RecursoController();
            $controlador->controlar();
        }
    }


?>