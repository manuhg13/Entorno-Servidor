<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer tabla || PR 12 </title>
</head>
<body>
    <?php
        require('conexionBD.php');
        try {
            
            $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS,BBDD);
            
            $sql='select * from equipo';
            $resultado= mysqli_query($conexion,$sql);
    
    
            while($fila = $resultado->fetch_array()){
                echo $fila['id'] . " ";
                echo $fila['nombre']. '<br>';
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