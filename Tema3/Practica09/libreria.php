<?php
    function vacio($dato){
        if (empty($_REQUEST[$dato])) {
            return true;
        }else {
            return false;
        }
    }

    function enviado(){
        if (isset($_REQUEST['enviar']))
            return true;
        return false;
    }
    function existe($nombre){
        if (isset($_REQUEST[$nombre]))
            return true;
        return false;
    }

    function patNombre(){
        $patron='/\D{3,}/';
        if (preg_match($patron,$_REQUEST['nombre'])==1){
            return true;
        }
        return false;
    }

    function patApellidos(){
        $patron='/\D{3,}\s\D{3,}/';
        if(preg_match($patron,$_REQUEST['apellidos'])==1){
            return true;
        }
        return false;
    }

    function patFecha(){
        $patron='/^([0-2][1-9]|3[0-1]\/[1-12]{1,2}\/\d{1,4})$/';
        if(preg_match($patron,$_REQUEST['fecha'])==1){
            $cortado=explode('/',$_REQUEST['fecha']);
            if(checkdate($cortado[1],$cortado[0],$cortado[2])){
                return true;
            }
        }
        return false;
    }
?>