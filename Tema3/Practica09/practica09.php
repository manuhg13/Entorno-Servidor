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
                if(enviado()){
                    if(vacio('nombre')){
                        echo "<p style='color: red'> Introduce un nombre</p>";
                    }elseif (!patNombre()) {
                        echo "<p style='color: red'> Introduce un nombre correcto</p>";    
                    }
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
                if(enviado()){
                    if (vacio('apellidos')) {
                        echo "<p style='color: red'> Introduce los apellidos</p>";        
                    }elseif (!patApellidos()) {
                        echo "<p style='color: red'> Introduce los apellidos correctamente</p>";        
                    }
                }
            ?>
        </p>
        <p>
            <label for="idFecha">Fecha</label>
            <input type="text" name="fecha" id="idFecha" placeholder="dd/mm/aaaa" value="<?php
                if (enviado() && !vacio('fecha')){
                    echo $_REQUEST['fecha'];
                }
            ?>">
            <?php
                if (enviado()){
                    if (vacio('fecha')) {
                        echo "<p style='color: red'>Introduce una fecha</p>";
                    }elseif (!patFecha()) {
                        echo "<p style='color: red'>Fecha no valida</p>";
                    }elseif (!mayor()) {
                        echo "<p style='color: red'>No es mayor</p>";
                    }
                }
            ?>
        </p>
        <p>
            <label for="idDNI">Dni: </label>
            <input type="text" name="dni" id="idDNI"  placeholder="NIF" value="<?php
                if (enviado() && !vacio('dni')) {
                    echo $_REQUEST['dni'];
                }
            ?>">

            <?php
                if (enviado()){
                    if(vacio('dni') && !patDNI()){
                        echo "<p style='color: red'>DNI incorrecto</p>";
                    }
                }
            ?>
        </p>

        <p>
            <label for="idEmail">Email: </label>
            <input type="text" name="mail" id="idEmail" placeholder="Email" value="<?php
                if (enviado() && !vacio('mail')) {
                    echo $_REQUEST['mail'];
                }
            ?>">

            <?php
                
            ?>
        </p>

        <input type="submit" value="Enviar" name="enviar" class="colorin">
    </form>
    <?php
       // }
    ?>
</body>
</html>