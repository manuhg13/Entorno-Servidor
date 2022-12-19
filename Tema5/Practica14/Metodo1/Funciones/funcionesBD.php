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

    function vacio($dato){
        if (empty($_REQUEST[$dato])) {
            return true;
        }else {
            return false;
        }
    }

    //----------------------------CRUD------------------------

    function eliminar(){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);

            $orden="delete from mejorPelicula where titulo='" . $_REQUEST['clave'] . "';";

            $conexion->exec($orden);

        } catch (Exception $ex) {
            if ($ex->getCode()==1045){
                echo "Credenciales incorrectas";
            }
            if ($ex->getCode()==2002){
                echo "Acabado tiempo de conexión";
            }       
            if ($ex->getCode()==1049){
                echo "No existe la base de datos no existe";
            }       
        }

    }

    function actualizar(){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            
            $orden="update mejorPelicula set titulo='" . $_REQUEST['titulo'] . "',director='" . $_REQUEST['director'] . "',genero='" . $_REQUEST['genero'] . "',estreno='" . $_REQUEST['estreno'] . "',nominaciones='" . $_REQUEST['nominaciones'] . "',nota='" . $_REQUEST['nota'] . "' where titulo='" . $_REQUEST['clave'] . "';" ;
            
            $conexion->exec($orden);
            

        } catch (Exception $ex) {
            if ($ex->getCode()==1045){
                echo "Credenciales incorrectas";
            }
            if ($ex->getCode()==2002){
                echo "Acabado tiempo de conexión";
            }       
            if ($ex->getCode()==1049){
                echo "No existe la base de datos no existe";
            }       
        }
    }

    function modificar(){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            
            $orden="insert into mejorPelicula values ('" . $_REQUEST['titulo'] . "','" . $_REQUEST['director'] . "','" . $_REQUEST['genero'] . "','" . $_REQUEST['estreno'] . "','" . $_REQUEST['nominaciones'] . "','" . $_REQUEST['nota'] . "');";
            
            $conexion->exec($orden);

        } catch (Exception $ex) {
            if ($ex->getCode()==1045){
                echo "Credenciales incorrectas";
            }
            if ($ex->getCode()==2002){
                echo "Acabado tiempo de conexión";
            }       
            if ($ex->getCode()==1049){
                echo "No existe la base de datos no existe";
            }       
        }
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
        $patron='/^([0-9]{1,4})-(1[0-2]?|[1-9])-([0-2]?[0-9]|3[0-1])$/';
        if(preg_match($patron,$_REQUEST['estreno'])==1){

            return true;
        } 
        return false;
    }
?>