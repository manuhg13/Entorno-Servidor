<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../CSS/estilo.css">
    <title>Modificar tabla || PR12</title>
</head>
<body>
    <?
        require("../../../CSS/cabecera.html");
        require("../../../CSS/intro.html");
        require('Funciones/funcionesBD.php');
        require('conexionBD.php');

       
       
        $operacion=$_REQUEST['op'];
    
        if ($operacion=='eli'){
            $clave=$_REQUEST['clave'];
            eliminar();
            
            header("Location: ./leerTabla.php");
        }elseif (enviado() && patFecha()) {
            if ($operacion=='mod'){
                $clave=$_REQUEST['clave'];

                actualizar();
                

                header("Location: ./leerTabla.php");
            }elseif ($operacion=='ins') {
                modificar();

                header("Location: ./leerTabla.php");
            }
        }

    ?>

    <?
            try {
                $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
                
                if ($operacion=='mod'){
                    $clave=$_REQUEST['clave'];   
                    $sql="select * from mejorPelicula where titulo='" . $clave . "';";
                    $resultado= $conexion->query($sql);
                    while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                        $titulo=$fila['titulo'];
                        $director=$fila['director'];
                        $genero=$fila['genero'];
                        $estreno=$fila['estreno'];
                        $nominaciones=$fila['nominaciones'];
                        $nota=$fila['nota'];
                    }
                }
                    
        
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
        
        <input type="hidden" name="op" value="<?
            echo $operacion;
        ?>">

        <input type="hidden" name="clave" value="<?
            if ($operacion=='mod') {
                echo $clave;
            }
        ?>">

        
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" value="<?php
            if ($operacion=='mod'){
                echo $titulo;
            }
        ?>">
         <?php
            if(enviado()){
                if (vacio('titulo')) {
                    echo "<p style='color: red'>Introduce el titulo</p>";
                }
            }
        ?>


        <br>
        <br>


        <label for="director">Director:</label>
        <input type="text" name="director" id="director" value="<?
            if ($operacion=='mod'){
                echo $director;
            }
        ?>">
        <?php
            if(enviado()){
                if (vacio('director')) {
                    echo "<p style='color: red'>Introduce el director</p>";
                }
            }
        ?>


        <br>
        <br>


        <label for="genero">Género</label>
        <input type="text" name="genero" id="genero" value="<?
            if ($operacion=='mod'){
                echo $genero;
            }
        ?>">
        <?php
            if(enviado()){
                if (vacio('genero')) {
                    echo "<p style='color: red'>Introduce el género</p>";
                }
            }
        ?>


        <br>
        <br>


        <label for="estreno">Estreno:</label>
        <input type="text" name="estreno" id="estreno" value="<?
            if ($operacion=='mod'){
                echo $estreno;
            }
        ?>">
        <?php
            if(enviado()){
                if (!patFecha()) {
                    echo "<p style='color: red'>Introduce la fecha de manera correcta, en formato (aaaa-mm-dd)</p>";
                }
            }
        ?>

        <br>
        <br>

        <label for="nominaciones">Nominaciones:</label>
        <input type="number" name="nominaciones" id="nominaciones" value="<?php
            if ($operacion=='mod'){
                echo $nominaciones;
            }
        ?>">

        <br>
        <br>
        <label for="nota">Nota:</label>
        <input type="number" step="0.1" name="nota" id="nota" value="<?
            if($operacion=='mod'){
                echo $nota;
            }
            ?>">
        
        <br>
        <br>
        <input class="colorin" type="submit" value="Guardar" name="enviado">

    </form>

</body>
</html>