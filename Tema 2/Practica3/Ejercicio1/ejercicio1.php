<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <?php
        echo "<h2>a. Muestra el nombre del fichero que se está ejecutando</h2>";
        //echo "<br>";
        echo basename(__FILE__);
        echo "<h2>b. Muestra la dirección IP del equipo desde el que estas accediendo</h2>";
        echo "$_SERVER[HTTP_HOST]";
        echo "<h2>c. Muestra el path donde se encuentra el fichero que se está ejecutando.</h2>";
        echo "$_SERVER[SCRIPT_NAME]";
        echo "<h2>d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18.</h2>";
        echo date("Y-m-d H:i:s",strtotime("now"));
        echo "<h2>e. Muestra la fecha y hora actual en Oporto formateada en (día de la semana, dia de mes de año, hh:mm:ss, Zona horaria).</h2>";
        date_default_timezone_set('Europe/Lisbon');
        echo date("l d H:i:s date_default_timezone_get()",strtotime("now"));
    ?>
</body>
</html>