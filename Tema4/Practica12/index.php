<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio || Practica 12</title>
</head>
<body>
    <?php
        require_once();
    ?>

    <form action="index.php" method="post">

        <?
            require_once('conexionBD.php');
            try {
                $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
            } catch (Exception $ex) {
                if ($ex->getCode()==1045){
                    echo "Credenciales incorrectas";
                }
                if ($ex->getCode()==2002){
                    echo "Acabado tiempo de conexión";
                }       
                if ($ex->getCode()==1049){
                    echo "No existe la base de datos no existe";
                    echo '<input type="submit" value="script" name="script" class="colorin">';

                }      
            }
        
        ?>
    </form>
</body>
</html>