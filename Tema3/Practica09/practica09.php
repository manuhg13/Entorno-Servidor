<?php
    require("libreria.php");
?>
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
        /*if (validarTodo()){
            imprimirInfo();
        }else{*/
    
    ?>
    <form action="./practica09.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre: </label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php
                if (enviado() && !vacio('nombre')){
                    echo $_REQUEST['nombre'];
                }
            ?>">

            <?php
                if(vacio('nombre') && enviado() && !patNombre()){
                    echo "<p style='color: red'> Introduce un nombre correcto</p>";
                }
            ?>
        </p>
        <p>
            <label for="idApellidos">Apellidos</label>
            <input type="text" name="apellidos" id="idApellidos" placeholder="Apellidos" value="<?php
                if (enviado() && !vacio('apellidos')){
                    echo $_REQUEST['apellidos'];
                }
            ?>">
            <?php
                if(vacio('apellidos') && enviado() && !patApellidos()){
                    echo "<p style='color: red'> Introduce correctamente los apellidos</p>";
                }
            ?>
        </p>
    </form>
    <?php
       // }
    ?>
</body>
</html>