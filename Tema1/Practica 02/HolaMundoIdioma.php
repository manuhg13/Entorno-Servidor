<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HolaMundoIdioma</title>
</head>
<body>
    <?php
        $es="Hola Mundo";
        $en="Hello World";
        $ja="こんにちは世界";
        $de="Hallo Welt";
        $cn="你好世界";
        $idioma=$_GET['pais'];
        echo "${$idioma}";
    ?>
</body>
</html>