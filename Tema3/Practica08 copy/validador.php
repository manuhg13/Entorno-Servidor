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
        if (existe($_REQUEST[$array])) {
            if (count($_REQUEST[$array])>3){
                return true;
            }
        }
        return false;
    }


    function telefono($num){
        if (existe($_REQUEST[$num])) {
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
                                    if (!vacio('telefono') && telefono('telefono')) {
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

        echo "<p>Alfabético: ". $_REQUEST["alfabetico"] . "</p>";
        if(existe($_REQUEST["alfabeticoOpt"])){
            echo "<p>Alfabético opcional: ". $_REQUEST["alfabeticoOpt"] . "</p>";
        }
       echo "<p>Alfanumérico: ". $_REQUEST["alfaNum"] . "</p>";
       if(existe($_REQUEST["alfaNumOpt"])){
            echo "<p>Alfanumérico opcional: ". $_REQUEST["alfaNumOpt"] . "</p>";
       }
       echo "<p>Fecha: ". $_REQUEST["fecha"] . "</p>";
       if(existe($_REQUEST["fechaOpt"])){
            echo "<p>Fecha opcional: ". $_REQUEST["fechaOpt"] . "</p>";
       }
       echo "<p>Radios: ". $_REQUEST["radios"] . "</p>";
       echo "<p>Desplegable: ". $_REQUEST["selector"] . "</p>";
       echo "<p>";
       echo "Check box: ";
       foreach($_REQUEST["box"] as $valor){
        echo "| $valor ";
       }
       echo "</p>";
       echo "<p>Telefono: ". $_REQUEST["telefono"] . "</p>";
       echo "<p>Email: ". $_REQUEST["mail"] . "</p>";
       echo "<p>Contraseña: ". $_REQUEST["pass"] . "</p>";
       echo "<p> fichero: ";
       echo $_FILES['fichero']['name'];
       echo "</p>";
        
    }
?>