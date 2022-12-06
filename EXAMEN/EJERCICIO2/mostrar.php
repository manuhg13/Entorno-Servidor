<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar </title>
</head>
<body>
    <?php
        print_r($_REQUEST['asignaturas']);
        echo "<p>Nombre y apellidos: " . $_REQUEST['nombre'] . "</p>";
        echo "<p>Expediente: " . $_REQUEST['exp'] . "</p>";
        echo "<p>Curso: " . $_REQUEST['curso'] . "</p>";
        echo "<p>Asignaturas: " ;
        foreach ($_REQUEST['asignaturas'] as $valor ) {
            echo $valor . "|" ;
        }
        echo "</p>";
    ?>
</body>
</html>