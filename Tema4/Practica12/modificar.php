<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <title>Modificar tabla || PR12</title>
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

            header("Location: ./leerTabla.php");
        }elseif (enviado()) {
            if ( $_REQUEST['operacion']=='mod'){
                try {
                    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                    
                    $orden="update mejorPelicula set titulo='" . $_REQUEST['titulo'] . "',director='" . $_REQUEST['director'] . "',genero='" . $_REQUEST['genero'] . "',estreno='" . $_REQUEST['estreno'] . "',nominaciones='" . $_REQUEST['nominaciones'] . "',nota='" . $_REQUEST['nota'] . "' where titulo='" . $_REQUEST['clave1'] . "';" ;
                    
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

                header("Location: ./leerTabla.php");
            }elseif ($_REQUEST['operacion']=='ins') {
                try {
                    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                    
                    $orden="insert into mejorPelicula values ('" . $_REQUEST['titulo'] . "','" . $_REQUEST['director'] . "','" . $_REQUEST['genero'] . "','" . $_REQUEST['estreno'] . "','" . $_REQUEST['nominaciones'] . "','" . $_REQUEST['nota'] . "');";
                    
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

                header("Location: ./leerTabla.php");
            }
        }

    ?>

    <?
            try {
                    
                $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
                
                if ($_REQUEST['op']=='mod'){
                    $sql="select * from mejorPelicula where titulo='" . $_REQUEST['clave'] . "';";
                    $resultado= mysqli_query($conexion,$sql);
                    while($fila = $resultado->fetch_array()){
                        $titulo=$fila['titulo'];
                        $director=$fila['director'];
                        $genero=$fila['genero'];
                        $estreno=$fila['estreno'];
                        $nominaciones=$fila['nominaciones'];
                        $nota=$fila['nota'];
                    }
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
            
   

    <form action="./modificar.php" method="post">
        
        <input type="hidden" name="operacion" value="<?
            echo $_REQUEST['op'];
        ?>">
        <input type="hidden" name="clave1" value="<?
            if ($_REQUEST['op']=='mod') {
                echo $_REQUEST['clave'];
            }
        ?>">

        
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" value="<?php
            if ($_REQUEST['op']=='mod'){
                echo $titulo;
            }
        ?>">
        <br>
        <br>
        <label for="director">Director:</label>
        <input type="text" name="director" id="director" value="<?
            if ($_REQUEST['op']=='mod'){
                echo $director;
            }
        ?>">
        <br>
        <br>
        <label for="genero">Género</label>
        <input type="text" name="genero" id="genero" value="<?
            if ($_REQUEST['op']=='mod'){
                echo $genero;
            }
        ?>">
        <br>
        <br>
        <label for="estreno">Estreno:</label>
        <input type="text" name="estreno" id="estreno" value="<?
            if ($_REQUEST['op']=='mod'){
                echo $estreno;
            }
        ?>">
        <br>
        <br>

        <label for="nominaciones">Nominaciones:</label>
        <input type="number" name="nominaciones" id="nominaciones" value="<?php
            if ($_REQUEST['op']=='mod'){
                echo $nominaciones;
            }
        ?>">
        <br>
        <br>
        <label for="nota">Nota:</label>
        <input type="number" step="0.1" name="nota" id="nota" value="<?
            if($_REQUEST['op']=='mod'){
                echo $nota;
            }
        ?>">
        
        <input class="colorin" type="submit" value="Guardar" name="enviado">

    </form>

</body>
</html>