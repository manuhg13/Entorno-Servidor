<?php
    function br(){
        echo "<br>";
    }

    function h1($cadena){
        echo "<h2>" . $cadena . "</h2>";
    }

    function p($cadena){
        echo "<p>" . $cadena . "</p>";
    }

    function self(){
        echo basename(__FILE__);
    }

    function letraDNI(){
        echo "";
    }

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
?>