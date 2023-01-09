<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/formulario.css">
    <title>Iniciar Sesión</title>
    <?
        session_start();
    ?>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo.png" alt="logo">
        </div>
        <div class="botones">
            <a href="login.php" class="boton">Iniciar sesion</a>
            <a href="registro.php" class="boton">Registrarse</a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php" class="activo">Inicio</a></li>
            <li><a href="./index.php">Tienda</a></li>
            <li><a href="./index.php">Ayuda</a></li>
        </ul>
    </nav>
    <br>
    <div class="ordenar">
        <div class="caja">
            <form action="../Funciones/validaciones.php" method="post">
                <label for="user">Usuario</label>
                <input type="text" name="user" id="idUser">
                <br><br>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="idPass">
                <br><br>
                <input type="submit" value="Enviar" name="enviar" class="boton">
            </form>
        <?
            if(isset($_SESSION['error'])){
                echo "<p style='padding: 10px; color: red'>" . $_SESSION['error'] . "</p>";
            }
            unset($_SESSION['error']);
        ?>  
        </div>
    </div>

</body>
</html>