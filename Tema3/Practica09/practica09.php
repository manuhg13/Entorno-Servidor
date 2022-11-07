<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 09 || ManuelHG</title>
</head>
<body>
    <?php
        include_once("../../CSS/cabecera.html");
        include_once("../../CSS/intro.html");
    ?>
    <h1>Formulario</h1>
    <?php
        if (validarTodo()){
            imprimirInfo();
        }else{
    
    ?>
    <form action="./practica09.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre: </label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php
                if (enviado() && !vacio('nombre')){
                    echo $_REQUEST['nombre'];
                }
            ?>">
        </p>
    </form>
    <?php
        }
    ?>
</body>
</html>