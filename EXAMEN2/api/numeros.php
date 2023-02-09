<?
     require_once './config/configuracion.php';
    
     $recurso=FatherController::recurso(); 
 
     if($recurso){
         if ($recurso[1]=='numeros') {
             $controlador= new numeroController();
             $controlador->controlar();
         }
     }
 
?>