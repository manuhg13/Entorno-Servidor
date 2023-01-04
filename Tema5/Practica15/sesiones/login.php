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
    <br>
        <form action="../Funciones/validaciones.php" method="post">
            <label for="user">Usuario</label>
            <input type="text" name="user" id="idUser">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="idPass">
            <input type="submit" value="Enviar" name="enviar">
        </form>

    <?
        if(isset($_SESSION['error'])){
            echo "<p style='padding: 10px; color: red'>" . $_SESSION['error'] . "</p>";
        }
        unset($_SESSION['error']);
    ?>
</body>
</html>