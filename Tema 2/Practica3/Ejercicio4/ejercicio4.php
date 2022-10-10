<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../CSS/estilo.css">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        include_once("../../../CSS/cabecera.html");
    ?>
    <?php
        include_once("../../../CSS/intro.html");
        echo "<h2>Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años.</h2>";
        $fecha1=new DateTime($_GET["fecha1"]);
        $fecha2=new DateTime($_GET["fecha2"]);
        $diferencia= $fecha2->diff($fecha1);
        echo "Años de diferencia: " . $diferencia->y;
    ?>

    <?php
        include_once("../../../CSS/pie.html");
    ?>
</body>
</html>