<?php
    require('./Seguro/conexion.php');
    try {
        /*-----Con funciones----*/ 
        $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,'mundial');
        
        $sql='select * from equipo';
        $resultado= mysqli_query($conexion,$sql);


        while($fila = $resultado->fetch_array()){
            echo $fila['id'] . " ";
            echo $fila['nombre']. '<br>';
        }
        
        mysqli_close($conexion);
        /*------> Con Objetos--------
        $conexion0 = new mysqli();
        $conexion0->connect($_SERVER['SERVER_ADDR'],USER,PASS,'mundial');
        $conexion0->close();*/
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

    try {
        /*-----Consultas preparadas----*/ 
        $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,'mundial');

        
        $sql='select * from equipo where id = ? and nombre = ?';

        $consultaPreparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consultaPreparada,$sql);

        $id=1;
        $nombre='España';

        mysqli_stmt_bind_param($consultaPreparada,'i',$id);
        mysqli_stmt_bind_param($consultaPreparada,'s',$nombre);

        mysqli_stmt_execute($consultaPreparada);


        
        
        mysqli_close($conexion);
        
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