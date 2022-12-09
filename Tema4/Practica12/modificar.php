<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <title>Modificar</title>
</head>
<body>
    <?
        require("../../CSS/cabecera.html");
        require("../../CSS/intro.html");
        require('./Funciones/funcionesBD.php');
        require('./conexionBD.php');
        
        if ($_REQUEST['op']=='eli'){
            try {
                $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);

                $orden="delete from mejorPelicula where titulo='" . $_REQUEST['clave'] . "';";

                mysqli_query($conexion,$orden);


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

            header("Location: ");
        }elseif ($_REQUEST['op']=='mod' || $_REQUEST['operacion']=='mod') {
            if (enviado()){
                try {
                    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                    
                    $orden="update mejorPelicula set titulo='" . $_REQUEST['titulo'] . "',director='" . $_REQUEST['director'] . "',genero='" . $_REQUEST['genero'] . "',estreno='" . $_REQUEST['estreno'] . "',nominaciones='" . $_REQUEST['nominaciones'] . "',nota='" . $_REQUEST['nota'] . " where titulo='" . $_REQUEST['clave1'] . "';" ;
                    
                    mysqli_query($conexion,$orden);
                    
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

                header("Location: ");
            }
        }elseif ($_REQUEST['op']=='ins' || $_REQUEST['operacion']=='ins') {
            if (enviado()){
                try {
                    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                    
                    $orden="insert into mejorPelicula values (" . $_REQUEST['titulo'] . "," . $_REQUEST['director'] . "," . $_REQUEST['genero'] . "," . $_REQUEST['estreno'] . "," . $_REQUEST['nominaciones'] . "," . $_REQUEST['nota'] . ");";
                    
                    mysqli_query($conexion,$orden);
                    
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

                header("Location: ");

            }
        }

    ?>

    <?
        try {
                
            $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
            
            $sql="select * from mejorPelicula where titulo='" . $_REQUEST['clave'] . "';";
            $resultado= mysqli_query($conexion,$sql);
    
    
            while($fila = $resultado->fetch_array()){
               

            ?>
            
   

    <form action="./modificar.php" method="post">
        <input type="hidden" name="operacion" value="<?
            echo $_REQUEST['op'];
        ?>">
        <input type="hidden" name="clave1" value="<?
            echo $_REQUEST['clave'];
        ?>">

        <input type="text" name="titulo" id="titulo" value="<?php
            if ($_REQUEST['op']=='mod'){
                echo $fila['titulo'];
            }
        ?>">

        <input type="text" name="director" id="director" value="<?
            if ($_REQUEST['op']=='mod'){
                echo $fila['director'];
            }
        ?>">
        <input type="text" name="genero" id="genero" value="<?
            if ($_REQUEST['op']=='mod'){
                echo $fila['genero'];
            }
        ?>">
        <input type="date" name="estreno" id="estreno" value="<?
            if ($_REQUEST['op']=='mod'){
                echo $fila['estreno'];
            }
        ?>">

        <input type="number" name="nominaciones" id="nominaciones" value="<?php
            if ($_REQUEST['op']=='mod'){
                echo $fila['nominaciones'];
            }
        ?>">

        <input type="number" name="nota" id="nota" value="<?
            if($_REQUEST['op']=='mod'){
                echo $fila['nota'];
            }
        ?>">
        
        <input class="colorin" type="submit" value="Guardar" name="enviado">

    </form>

    <?
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
    ?>
</body>
</html>