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
<header>
        <div class="logo">
            <img src="../img/logo.png" alt="logo">
        </div>
        <div class="botones">
            <?
                session_start();
                if (estaValidado()) {
                    echo '<a href="../sesiones/login.php" class="boton">'.$_SESSION['user'].'</a>';
                    echo '<a href="../sesiones/logout.php" class="boton">Cerrar sesión</a>';
                }else {
                    
                
            ?>
                <a href="../sesiones/login.php" class="boton">Iniciar sesion</a>
                <a href="../sesiones/registro.php" class="boton">Registrarse</a>
            <?
                }
            ?>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../index.php" class="activo">Tienda</a></li>
            <li><a href="../index.php">Ayuda</a></li>
        </ul>
    </nav>
    <div class="ordenar">
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