<!DOCTYPE html>
<html lang="es"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <title>Inicio || Practica 12</title>
</head>
<body>
    <?
        require("../../CSS/cabecera.html");
        require("../../CSS/intro.html");

    ?>

    <?php
        require('conexionBD.php');
        require('Funciones/funcionesBD.php');

        if (enviarBBDD()){
            $script=anadirBBDD();
            $conexion2= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS);
            mysqli_multi_query($conexion2,$script);

        }
    ?>

    <form action="index.php" method="post">

        <?php
            try {
                $conexion1= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);

                echo "<a class='colorin' href='leerTabla.php'>Leer tabla</a>";
                echo "<br><br>";
                echo "<a class='colorin' href='modificar.php?op=ins'>Insertar registro</a>";
                
            } catch (Exception $ex) {
                if ($ex->getCode()==1045){
                    echo "Credenciales incorrectas";
                }
                if ($ex->getCode()==2002){
                    echo "Acabado tiempo de conexión";
                }       
                if ($ex->getCode()==1049){
                    echo "No existe la base de datos";
                    echo "<br><br>";
                    echo '<input type="submit" value="Añadir BBDD cine" name="script" class="colorin">';

                }      
            }
        
        ?>

        <h2>Ver código</h2>

        <a class='colorin' href='verCodigo.php?fichero=index.php'>Ver index.php</a>
        <a class='colorin' href='verCodigo.php?fichero=leerTabla.php'>Ver leerTabla.php</a>
        <a class='colorin' href='verCodigo.php?fichero=modificar.php'>Ver modificar.php</a>
        <a class='colorin' href='verCodigo.php?fichero=conexionBD.php'>Ver conexionBD.php</a>


        
    </form>
</body>
</html>