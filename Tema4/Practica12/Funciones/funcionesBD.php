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
?>