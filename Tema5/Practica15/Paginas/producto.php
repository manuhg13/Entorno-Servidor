<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/principal.css">
    <title>Artículo</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="botones">
            <?
                session_start();
                if (estaValidado()) {
                    echo '<a href="./sesiones/login.php" class="boton">'.$_SESSION['user'].'</a>';
                    echo '<a href="./sesiones/logout.php" class="boton">Cerrar sesión</a>';
                }else {
                    
                
            ?>
                <a href="./sesiones/login.php" class="boton">Iniciar sesion</a>
                <a href="./sesiones/registro.php" class="boton">Registrarse</a>
            <?
                }
            ?>
        </div>
    </header>
</body>
</html>