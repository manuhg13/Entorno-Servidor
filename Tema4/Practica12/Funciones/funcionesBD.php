<?php
    function enviarBBDD(){
        if (isset($_REQUEST['script'])){
            return true;
        }
        return false;
    }

    function anadirBBDD(){
        return file_get_contents('./BBDD/cine.sql');
    }
?>