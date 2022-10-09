<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        include_once("../../../CSS/cabecera.html");
    ?>
    <?php
        include_once("../../../CSS/intro.html");
        echo "<h1>Ejercicio 1</h1>";
        echo "<h2>a. Muestra el nombre del fichero que se está ejecutando</h2>";
        echo basename(__FILE__);
        echo "<h2>b. Muestra la dirección IP del equipo desde el que estas accediendo</h2>";
        echo "$_SERVER[REMOTE_ADDR]";
        echo "<h2>c. Muestra el path donde se encuentra el fichero que se está ejecutando.</h2>";
        echo "$_SERVER[SCRIPT_NAME]";
        echo "<h2>d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18.</h2>";
        echo date("Y-m-d H:i:s", strtotime("now"));
        echo "<h2>e. Muestra la fecha y hora actual en Oporto formateada en (día de la semana, dia de mes de año, hh:mm:ss, Zona horaria).</h2>";
        date_default_timezone_set('Europe/Lisbon');
        echo date("l d H:i:s ", strtotime("now")) . date_default_timezone_get();
        echo "<h2>f.Incializa y muestra una variable en timestamp y en  .</h2>";
        $fecha = new DateTime("12/01/1997");
        echo date_timestamp_get($fecha). " " .date_format($fecha, 'd/m/y');
        echo "<h2>g.Calcular la fecha y el día de la dentro de 60 días.</h2>";
        $hoy = date("d-m-y");
        echo date("d-m-y", strtotime("+ 60 days"));
    ?>

    <?php
        include_once("../../../CSS/pie.html");
    ?>
</body>
</html>