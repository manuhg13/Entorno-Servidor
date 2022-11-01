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

    function correcto(){
        if (enviado()) {
           if (vacio("alfabetico") && enviado() && !is_numeric($_REQUEST['alfabetico'])){
                if (vacio("alfaNum") && enviado()) {
                    if (existe('radios')) {
                        if (existe('selector') && $_REQUEST['selector']==0) {
                            if (!existe('box') && enviado()) {
                                # code...
                            }
                        }
                    }
                }
           }
        }
    }
?>