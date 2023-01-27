<?
    require_once './controller/ControladorPadre.php';
    require_once './controller/ConciertosControlador.php';
    $recurso=ControladorPadre::recurso(); 

    if($recurso){
        if ($recurso[1]=='conciertos') {
            $controlador= new ConciertosControlador();
            $controlador->controlar();
        }
    }

?>