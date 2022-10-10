<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../CSS/estilo.css">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        include_once("../../../CSS/cabecera.html");
    ?>
    <?php
        include_once("../../../CSS/intro.html");
        echo "<h2>Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre el día de la semana de dicho día. (Por defecto, dale el valor de 12/09/2022)</h2>";
        foreach ($_GET as $valor) {
            $fecha= new DateTime($valor);
            echo date_format($fecha, "l");
        }
        echo "<div class='wrapper'>
        <div id='intro'>
                <li>
                    <ul>
                        <li class='dentro'><a href='ver3.php'>Ver fichero</a></li>
                    </ul>                  
                </li>
                <br class='clear'/>
            </div>
        </div>";
    ?>

    <?php
        include_once("../../../CSS/pie.html");
    ?>
</body>
</html>