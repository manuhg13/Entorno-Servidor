<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <title>Practica 4 || Manuel Hernández</title>
</head>
<body>
<?php
        include_once("../../CSS/cabecera.html");
    ?>
    <?php
        include_once("../../CSS/intro.html");
        echo "<h2>1. Realiza un programa utilizando bucles que muestre la siguiente figura</h2>";
        $lineas= 3;
        for ($i=1; $i <= $lineas; $i++) { 
            for ($espacios=1; $espacios<=$lineas-$i; $espacios++) { 
                echo "&nbsp;&nbsp";
            }
            for ($asteriscos=1; $asteriscos <=($i*2)-1; $asteriscos++) {    
                echo "*";
            } 
            echo "<br>";
        }
        echo "<h2>2. Realiza un programa utilizando bucles que muestre la siguiente figura</h2>";
        $rombo=3;
        
        for ($i=1; $i <= $rombo ; $i++) { 
            for ($espacios=1; $espacios<=$rombo-$i; $espacios++) { 
                echo "&nbsp;&nbsp";
            }
            for ($asteriscos=1; $asteriscos <=($i*2)-1; $asteriscos++) {    
                echo "*";
            } 
            echo "<br>";
        }
        for ($i=2; $i >= 1 ; $i--) { 
            for ($espacios=1; $espacios<=3-$i; $espacios++) { 
                echo "&nbsp;&nbsp";
            }
            for ($asteriscos=1; $asteriscos <=($i*2)-1; $asteriscos++) {    
                echo "*";
            } 
            echo "<br>";
        }
        
        echo "<h2>3. Realiza un programa utilizando bucles que muestre la siguiente figura</h2>";
        
        
        for ($i=1; $i <= $rombo ; $i++) { 
            for ($espacios=1; $espacios<=$rombo-$i; $espacios++) { 
                echo "&nbsp;&nbsp";
            }
            for ($asteriscos=1; $asteriscos <=($i*2)-1; $asteriscos++) {    
                if ($asteriscos==1 || $asteriscos==($i*2-1)) {
                    echo "*";
                }else {
                    echo "&nbsp;&nbsp;";
                }        
            } 
            echo "<br>";
        }
        for ($i=2; $i >= 1 ; $i--) { 
            for ($espacios=1; $espacios<=3-$i; $espacios++) { 
                echo "&nbsp;&nbsp";
            }
            for ($asteriscos=1; $asteriscos <=($i*2)-1; $asteriscos++) {    
                if ($asteriscos==1 || $asteriscos==($i*2-1)) {
                    echo "*";
                }else {
                    echo "&nbsp;&nbsp;";
                }
            } 
            echo "<br>";
        }
        
        echo "<h2>4. Realiza un programa que le introduzca un valor (pasado por la URL) de un producto con 2 decimales
        y posteriormente un valor con el que pagar por encima (Valor del producto 6.33€ y ha pagado con
        10€). Muestra el número mínimo de monedas con las que puedes devolver el cambio</h2>";

        $precio=(float)$_GET['precio'];
        $pago=(float)$_GET['pago'];
        $devolucion=$pago-$precio;
   
        $mon2euro=0;
        $mon1euro=0;
        $cent50=0;
        $cent20=0;
        $cent10=0;
        $cent5=0;
        $cent2=0;
        $cent1=0;

        while ($devolucion>=2) {
            $devolucion-=2;
            $mon2euro++;
        }
        while ($devolucion>=1) {
            $devolucion-=1;
            $mon1euro++;
        }
        while ($devolucion>=0.50) {
            $devolucion-=0.50;
            $cent50++;
        }
        while ($devolucion>=0.20) {
            $devolucion-=0.20;
            $cent20++;
        }
        while ($devolucion>=0.10) {
            $devolucion-=0.10;
            $cent10++;
        }
        while ($devolucion>=0.05) {
            $devolucion-=0.05;
            $cent5++;
        }
        while ($devolucion>=0.02) {
            $devolucion-=0.02;
            $cent2++;
        }
        while ($devolucion>=0.01) {
            $devolucion-=0.01;
            $cent1++;
        }

        echo "Se devuelven " . $mon2euro . " monedas de 2€";
        echo "<br>";
        echo "Se devuelven " . $mon1euro . " monedas de 1€";
        echo "<br>";
        echo "Se devuelven " . $cent50 . " monedas de 50 cent";
        echo "<br>";
        echo "Se devuelven " . $cent20 . " monedas de 20 cent";
        echo "<br>";
        echo "Se devuelven " . $cent10 . " monedas de 10 cent";
        echo "<br>";
        echo "Se devuelven " . $cent5 . " monedas de 5 cent";
        echo "<br>";
        echo "Se devuelven " . $cent2 . " monedas de 2 cent";
        echo "<br>";
        echo "Se devuelven " . $cent1 . " monedas de 1 cent";

        echo "<h2>5. Escriba un programa que se le pase un año por la URL y que escriba si es bisiesto o no.
        Los años bisiestos son múltiplos de 4, pero los múltiplos de 100 no lo son, aunque los múltiplos de
        400 sí.</h2>";

        $anio=(int)$_GET['anio'];
       
        if ($anio%4 == 0 && $anio%100 != 0 || $anio%400 == 0) {
            echo "<p>El año ". $anio . " es bisiesto.</p>";
        } else {
            echo "<p>El año ". $anio . " NO es bisiesto.</p>";
        }

        include_once("../../CSS/pie.html");
    ?>
</body>
</html>