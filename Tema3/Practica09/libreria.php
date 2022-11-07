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
?>