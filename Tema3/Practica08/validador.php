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

    function validarTodo(){
        if (enviado()) {
           if (!vacio("alfabetico") && is_numeric($_REQUEST['alfabetico'])) {
                if (!vacio('alfaNum')) {
                    if (!vacio('fecha')) {
                        if (existe('radios')) {
                            if (existe('selector') && $_REQUEST['selector']!=0) {
                               if (existe('box') && cuantos('box')) {
                                    if (!vacio('tel') && telefono('tel')) {
                                        return true;
                                    }
                               }
                            }
                        }
                    }
                }
           }
        }
    }

    function imprimirInfo(){

        foreach ($_REQUEST as $clave => $valor) {
            echo "<p>" . $clave ." => " . $valor . "</p>";
        }
        
    }
?>