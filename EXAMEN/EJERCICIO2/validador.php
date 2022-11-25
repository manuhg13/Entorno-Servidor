<?php

    function enviado(){
        if (isset($_REQUEST['Enviado']))
            return true;
        return false;
    }

    function vacio($dato){
        if (empty($_REQUEST[$dato])) {
            return true;
        }else {
            return false;
        }
    }

    function existe($nombre){
        if (isset($_REQUEST[$nombre]))
            return true;
        return false;
    }

    function patNombre(){
        $patron='/^\D{3,}\s\D{3,}\s\D{3,}$/';
        if(preg_match($patron,$_REQUEST['nombre'])==1){
            return true;
        }
        return false;
    }
    
    function patExp(){
        $patron='/\d{2}[A-Z]{3}\/\d{2}/';
        if(preg_match($patron,$_REQUEST['exp'])==1){
            return true;
        }
        return false;
    }

    function primeraValidacion(){
        if (enviado()) {
            if (!vacio('nombre') && patNombre()){
                if (!vacio('exp') && patExp()) {
                    if ($_REQUEST['curso']!="no") {
                        return true;
                    }
                }
            }
        }
        return false;
    }
    function segundaValidacion(){
        if (enviado()) {
            if (!vacio('nombre') && patNombre()){
                if (!vacio('exp') && patExp()) {
                    if ($_REQUEST['curso2']!="no") {
                        if (!existe('asignarturas')) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }

    




?>