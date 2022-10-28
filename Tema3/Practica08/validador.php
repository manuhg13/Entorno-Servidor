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

    function cuantos($array){
       if (count($_REQUEST[$array])>3){
            return true;
        }
        return false;
    }


    function telefono($num){
        if (strlen($_REQUEST[$num])==9) {
            return true;
        }
        return false;
    }

    function validarTodo($datos){
        
    }
?>