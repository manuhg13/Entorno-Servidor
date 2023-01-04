<?php

 
// sesiones

function estaValidado() {
    if(isset($_SESSION["validado"])){
        return true;
    }
    return false;
}

function esAdmin() {
    if(isset($_SESSION["perfil"])){
        if($_SESSION["perfil"] == "ADM") {
            return true;
        }
    }
    return false;
}

function esModerador() {
    if(isset($_SESSION["perfil"])){
        if($_SESSION["perfil"] == "MOD") {
            return true;
        }
    }
    return false;
}


function enviado(){
    if(isset($_REQUEST["enviar"])){
        return true;
    }
    return false;
}

function enviadoGuardar(){
    if(isset($_REQUEST["guardar"])){
        return true;
    }
    return false;
}

function crearBD(){ 
    $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'], USER, PASS);
    $script = (file_get_contents("../sql/zapatillas.sql"));
    //$consulta = $conexion->prepare($script);
    $conexion->exec($script);
}

// modificar BD

function validaUser($user, $pass) {
    try {
        $conexion = new PDO("mysql:host=".$_SERVER["SERVER_ADDR"].";dbname=".BBDD, USER, PASS);
        $sql = "select * from usuarios where nombre = ? and pass = ?";
        $sql_p = $conexion->prepare($sql);
        $pass_e = sha1($pass);
        $array = array($user, $pass_e);
        $sql_p->execute($array);

        //si devuelve algo retorna true
        if($sql_p->rowCount() == 1){
            session_start();
            $_SESSION['validado'] = true;
            $row = $sql_p->fetch();
            $_SESSION['user'] = $user;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['perfil'] = $row['perfil'];
            unset($conexion);
            return true;
        } else {
            // si no, no retorna falso
            unset($conexion);
            return false;
        }



    } catch (Exception $ex) {
        print_r($ex);
        unset($conexion);
    }

}

function eliminarDProducto(){
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BBDD, USER, PASS);

        $script = "delete from productos where id='".$_REQUEST["cod_producto"]."';";
        $consulta = $conexion->prepare($script);
        $consulta->execute();
    
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

function modificarDatos(){
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BBDD, USER, PASS);

        $script = "update LosAngelesLakers set jugador='".$_REQUEST["jugador"]."', edad='".$_REQUEST["edad"]."', puntos='".$_REQUEST["puntos"]."', asistencias='".$_REQUEST["asistencias"]."', rebotes='".$_REQUEST["rebotes"]."', fechadebut='".$_REQUEST["fecha"]."' where id='".$_REQUEST["id"]."';";
    
        $consulta = $conexion->prepare($script);
        $consulta->execute();

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

function insertarDatos() {
    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname='.BBDD, USER, PASS);

        $script = "insert into `LosAngelesLakers` (`jugador`, `edad`, `puntos`, `asistencias`, `rebotes`, `fechadebut`) values ('".$_REQUEST["jugador"]."','".$_REQUEST["edad"]."','".$_REQUEST["puntos"]."','".$_REQUEST["asistencias"]."','".$_REQUEST["rebotes"]."','".$_REQUEST["fecha"]."');";
        
        $consulta = $conexion->prepare($script);
        $consulta->execute();
        
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

// expresiones regulares

function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}

function compEdad($edad){
    $patron = '/^(\d{2})$/';
    if(preg_match($patron, $_REQUEST[$edad]) == 1){
        return true;
    }
    return false;
}

function compStats($stats){
    $patron = '/^(\d{1,2}\.\d{1})$/';
    if(preg_match($patron, $_REQUEST[$stats]) == 1){
        return true;
    }
    return false;
}

function compFecha($fecha){
    $patron = '/^(\d{4})\-(0[1-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/';
    
    if(preg_match($patron, $_REQUEST[$fecha])==1){
        return true;
    }
    return false;
}

function compLongitud($nombre){
    if(isset($_REQUEST[$nombre])){
        $i = $_REQUEST[$nombre];
        if(strlen($i) <= 60){
            return true;
        }
    }
    return false;
}

function compTodo() {
    if(!vacio("jugador") && compLongitud("jugador")){
        if(!vacio("edad") && compEdad("edad")){
            if(!vacio("puntos") && compStats("puntos")){
                if(!vacio("asistencias") && compStats("asistencias")){
                    if(!vacio("rebotes") && compStats("rebotes")){
                        if(!vacio("fecha") && compFecha("fecha")){
                            return true;
                        }
                    }
                }
            }
        }
    }
    return false;
}

?>