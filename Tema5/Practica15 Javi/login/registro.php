<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/estilos.css">
    <title>login</title>
</head>
<body>
    <header>
        <h1>texteo</h1>
    </header>
    <main>
        <section class="caja2">
            <h2>Registro</h2>
            <form action="./funciones/valida.php" method="post">
                <p>
                    <label for="user">Usuario: </label>
                    <input type="text" name="user" id="user">
                </p>
                <p>
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass">
                </p>
                <p>
                    <label for="email">Correo Electronico: </label>
                    <input type="password" name="email" id="email">
                </p>
                <p>
                    <label for="fecha">Fecha: </label>
                    <input type="password" name="fecha" id="fecha">
                </p>
                <input type="submit" value="enviar" name="enviar">
            </form>
        </section>
    </main>
</body>
</html>