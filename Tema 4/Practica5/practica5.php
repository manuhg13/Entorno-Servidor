<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <title>Practica 5</title>
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
        sort($datosOrdenados);

        foreach ($datosOrdenados as $valor) {
            echo $valor . "&nbsp;&nbsp;";
        }
        
        echo "<h2>2. Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y cambie el
        valor por el número de la posición</h2>";

        foreach ($datos as $clave => $valor) {
            if ($valor==3) {
                $sustituye=$clave;
                array_splice($datos, $clave, 1, $clave);
            }
        }

        foreach ($datos as $clave) {
            echo $clave . "&nbsp;&nbsp;";
        }


        echo "<h2>Matriz</h2>";

        $lado=4;

        $matriz=array($lado,$lado);

        for ($i=0; $i<= $lado; $i++) { 
            for ($j=0; $j < $lado; $j++) { 
                if ($i==0 || j==0){
                    array_push($matriz[$i][$j],1);
                }
                
                
            }
        }

        foreach ($matriz as $key ) {
            echo $key . "&nbsp;&nbsp;";
        }
    ?>
</body>
</html>