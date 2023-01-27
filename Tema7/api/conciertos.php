<?
    require_once './config/configuracion.php';
    
    $recurso=ControladorPadre::recurso(); 

    if($recurso){
        if ($recurso[1]=='conciertos') {
            $controlador= new ConciertosControlador();
            $controlador->controlar();
        }
    }

?>