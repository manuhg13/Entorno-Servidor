<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../CSS/estilo.css">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        include_once("../../../CSS/cabecera.html");
    ?>
    <?php
        include_once("../../../CSS/intro.html");
        echo "<h1>Ejercicio 2</h1>";
        echo "<h2>Crea una página a la que se le pase por url una variable con el nombre que quieras y muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float.</h2>";
        foreach ($_GET as $valor) {
            # code...
        }
        if (is_numeric($GET['gatos'])) {
            if(strpos($_GET['gatos'], '.')!== false){
                echo ""
            }
            echo $_GET[$i] . " es numerico y es un " . gettype($_GET[$i]);
        } else {
            echo $_GET[$i] . " no es numerico";
        }
       
       include_once("../../../CSS/pie.html");
    ?>
</body>
</html>