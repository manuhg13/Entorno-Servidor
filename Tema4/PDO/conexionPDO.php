<?
    require('../Practica12/conexionBD.php');

    //conexión

    try {
        $conexion= new PDO('mysql:host=' . $_SERVER['SERVER_ADDR']. ';dbname=' . BBDD,USER,PASS);

        echo 'Funciona';
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

?>