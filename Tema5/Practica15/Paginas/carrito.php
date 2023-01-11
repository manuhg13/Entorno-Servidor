<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/principal.css">
    <title>Carrito</title>
</head>
<body>
            <?
                
            require("../seguro/conexionBD.php");
            require("../Funciones/funciones.php");
            
                session_start();
                if (estaValidado()) {
                    vendido();
                    header('Location: ../index.php');
                    exit;
                }else {
                    header('Location: ../login.php');
                    exit;
                }
            ?>
        
        <?
            try {
                $conexion=new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);

                $consulta= $conexion->query("SELECT * FROM productos where idProducto='".$_REQUEST['id']."'");

                unset($conexion);
            } catch (Exception $ex) {
                if ($ex->getCode()==1045){
                    echo "Credenciales incorrectas";
                }
                if ($ex->getCode()==2002){
                    echo "Acabado tiempo de conexión";
                }       
                if ($ex->getCode()==1049){
                    echo "No hay BBDD";
        
                }      
            }
        ?>

    </div>
</body>
</html>