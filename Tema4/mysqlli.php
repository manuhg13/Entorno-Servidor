<?php
    require('./Seguro/conexion.php');
    try {
        $conexion= mysqli_connect(HOST,USER,PASS);
        
    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión";
        }       
    }

    echo "Va perfe";
?>