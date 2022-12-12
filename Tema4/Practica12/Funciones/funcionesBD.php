<?php
    /* ------------Funciones del index------------------*/ 
    function enviarBBDD(){
        if (isset($_REQUEST['script'])){
            return true;
        }
        return false;
    }

    function anadirBBDD(){
        return file_get_contents('./BBDD/cine.sql');
    }

    /*------------Funciones para CRUD---------------------- */
    
    function existe($nom){
        if (isset($_REQUEST[$nom])){
            return true;
        }
        return false;
    }

    function enviado(){
        if (isset($_REQUEST['enviado'])){
            return true;
        }
        return false;
    }

    function patFecha(){
        $patron='/^([0-9]{1,4})-(1[0-2]?|[1-9]{1})-([0-2]?[0-9]|3[0-1])$/';
        if(preg_match($patron,$_REQUEST['estreno'])==1){
            $cortado=explode('-',$_REQUEST['estreno']);
            if(checkdate($cortado[1],$cortado[0],$cortado[2])){
                return true;
            }
        }
        return false;
    }
?>