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
        echo "<h2>1. Realiza un programa utilizando bucles qie muestre la siguiente figura</h2>";
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
        echo "<h2>2. Realiza un programa utilizando bucles qie muestre la siguiente figura</h2>";
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
        
        echo "<h2>3. Realiza un programa utilizando bucles qie muestre la siguiente figura</h2>";
        $invertido=5;
        for ($i=1; $i <=$invertido ; $i++) { 
            if ($i<4) {
                for ($espacios=1; $espacios<=($invertido/2)-$i ; $espacios++) { 
                    echo "&nbsp;&nbsp";
                }
                for ($asteriscos=1; $asteriscos<= ($i*2)-1;$asteriscos++) {              
                    if ($asteriscos==1 || $asteriscos) {
                        echo "*";
                    }
                }
            } else {
               //for($espacios=1);
            }
            
        }

        
        include_once("../../CSS/pie.html");
    ?>
</body>
</html>