<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 4</title>
</head>
<body>
<?php
        include_once("../../CSS/cabecera.html");
    ?>
    <?php
        include_once("../../CSS/intro.html");
        $datos= [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
        echo "<h2>1. Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya elementos
        repetidos: datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3] </h2>";
        $datosOrdenados=array_unique($datos);
        

    ?>
</body>
</html>