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
        $patron='/\D{3,}$/';
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
        $patron='/^([0-2]?[0-9]|3[0-1])\/(1[0-2]?|[1-9]{1})\/([1-9]{1,4})$/';
        if(preg_match($patron,$_REQUEST['fecha'])==1){
            $cortado=explode('/',$_REQUEST['fecha']);
            if(checkdate($cortado[1],$cortado[0],$cortado[2])){
                return true;
            }
        }
        return false;
    }

    function mayor(){
        if (existe('fecha')){
            $fecha= new dateTime($_REQUEST['fecha']);
            $actual= new dateTime();
            $diferecia= $actual->diff($fecha);
            if ($diferecia->y >=18){
                return true;
            }
        }
        return false;
    }

    function patDNI(){
        $patron= '/\d{8}[T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z|S|Q|V|H|L|C|K|E]$/';
        if (preg_match($patron,$_REQUEST['dni'])==1){
            $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $num= substr($_REQUEST['dni'],0,8);
            $dni=$_REQUEST['dni'];
            if ($dni[8] == $letras[$num%23]){
                return true;
            }
        }
        return false;
    }

    function patMail(){
        $patron='/.{1,}@.{1,}\..{2,}/';
        if (preg_match($patron,$_REQUEST['mail'])==1){
            return true;
        }
        return false;
    }

?>