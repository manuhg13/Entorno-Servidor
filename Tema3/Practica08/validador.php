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
       if (isset($_REQUEST[$array])) {
           if (count($_REQUEST[$array])>3){
               return true;
           }
       }
        return false;
    }


    function telefono($num){
        if (isset($_REQUEST[$num])) {           
            if (strlen($_REQUEST[$num])==9) {
                return true;
            }
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
                               if (existe('box') && !cuantos('box')) {
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
        return false;
    }

    function imprimirInfo(){
        echo "<p>Alfabetico: ". $_REQUEST["alfabetico"] . "</p>";
        echo "<p>Alfabetico opcional: ". $_REQUEST["alfabeticoOpt"] . "</p>";
        echo "<p>Alfanumerico: ". $_REQUEST["alfaNum"] . "</p>";
        echo "<p>Alfanumerico opcional: ". $_REQUEST["alfaNumOpt"] . "</p>";
        echo "<p>Fecha: ". $_REQUEST["fecha"] . "</p>";
        echo "<p>Fecha opcional: ". $_REQUEST["fechaOpt"] . "</p>";
        echo "<p>Opciones radio: ". $_REQUEST["radios"] . "</p>";
        echo "<p>Opciones desplegable: ". $_REQUEST["selector"] . "</p>";
        echo "<p>Check: ";
        foreach ($_REQUEST["selector"] as $valor) {
           echo $valor . " | ";
        }   
        echo "</p>";
        echo "<p>Fichero: ". $_FILES["fichero"]['name'] . "</p>";
        echo "<p>Telefono: ". $_REQUEST["telefono"] . "</p>";
        echo "<p>mail: ". $_REQUEST["mail"] . "</p>";
        echo "<p>contraseña: ". $_REQUEST["pass"] . "</p>";
        
    }
?>