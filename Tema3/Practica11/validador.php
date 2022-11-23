<?php

    function enviado(){
        if (isset($_REQUEST['guardar'])){
            return true;
        }
        return false;
    }

    function patNotas($nota){
        $patron= '/^(10|\d)$/';
        if (preg_match($patron,$_REQUEST[$nota])==1){
            return true;
        }
        return false;
    }

    function vacio($dato){
        if (empty($_REQUEST[$dato])) {
            return true;
        }else {
            return false;
        }
    }

    function validarTodo(){
        if (enviado()){
            if (!vacio('nota1') && patNotas('nota1')){
                if(!vacio('nota2') && patNotas('nota2')){
                    if(!vacio('nota3') && patNotas('nota3')){
                        return true;
                    }
                }
            }
        }
        return false;
    }
?>