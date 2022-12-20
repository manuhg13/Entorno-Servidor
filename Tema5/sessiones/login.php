<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?
        session_start();
    ?>
</head>
<body>
    <?
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
        }
        unset($_SESSION['error']);
    ?>
    <form action="./funciones/validaciones.php" method="post">
        <label for="user">Usuario</label>
        <input type="text" name="user" id="idUser">
        <?
           
        ?>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="idPass">
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>
</html>