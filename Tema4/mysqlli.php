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
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    try {
        /*-----Consultas preparadas----*/ 
        $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,'mundial');

        
        $sql='select * from equipo where id = ? and nombre = ?';

        $consultaPreparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consultaPreparada,$sql);

        $id=1;
        $nombre='España';

        mysqli_stmt_bind_param($consultaPreparada,'is',$id,$nombre);
        mysqli_stmt_execute($consultaPreparada);

        mysqli_stmt_bind_result($consultaPreparada,$r_id,$r_nom);
        

        while (mysqli_stmt_fetch($consultaPreparada)) {
            echo "<br> ID: " . $r_id .  " Nombre: " . $r_nom;
        }
  
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
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    try {
        /*-----Consultas preparadas insert----*/ 
        $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,'mundial');

        
        $sql='insert into equipo values (?,?)';

        $consultaPreparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consultaPreparada,$sql);

        $id=3;
        $nombre='Brasil';

        mysqli_stmt_bind_param($consultaPreparada,'is',$id,$nombre);
        mysqli_stmt_execute($consultaPreparada);
        echo mysqli_stmt_num_rows($consultaPreparada);


        //mysqli_stmt_bind_result($consultaPreparada,$r_id,$r_nom);
        

        /*while (mysqli_stmt_fetch($consultaPreparada)) {
            echo "<br> ID: " . $r_id .  " Nombre: " . $r_nom;
        }*/
  
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
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    try {
        /*-----Consultas preparadas update----*/ 
        $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,'mundial');

        
        $sql="update equipo set nombre= ? where nombre='Brasil'";

        $consultaPreparada= mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($consultaPreparada,$sql);

        $nombre='Japon';

        mysqli_stmt_bind_param($consultaPreparada,'s',$nombre);
        echo mysqli_stmt_affected_rows($consultaPreparada);
        mysqli_stmt_execute($consultaPreparada);


        //mysqli_stmt_bind_result($consultaPreparada,$r_id,$r_nom);
        

        /*while (mysqli_stmt_fetch($consultaPreparada)) {
            echo "<br> ID: " . $r_id .  " Nombre: " . $r_nom;
        }*/
  
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
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    try {
        /*-----Consultas preparadas update----*/ 
        $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,'mundial');

        
        $sql="insert into equipo values (4,'Australia');";
        $sql1="insert into equipo values (5,'Argentina');";
        $sql2="insert into equipo values (6,'Croacia');";
        $sql2="insert into equipo values (6,'Islandia');";

        mysqli_query($conexion,$sql);
        mysqli_query($conexion,$sql1);
        mysqli_query($conexion,$sql2);

        mysqli_autocommit($conexion,false);


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
        //mysqli_rollback($conexion);
    } finally{
        //mysqli_close($conexion);
        
    }



    


?>