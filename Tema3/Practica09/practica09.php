<?php
    require("libreria.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilo.css">
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
            <label for="idApellidos">Apellidos: </label>
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
            <label for="idContraseña">Contraseña: </label>
            <input type="text" name="pass" id="idContraseña" placeholder="Contraseña">
            
            <?php
                if (enviado()) {
                    if (vacio('pass')) {
                        echo "<p style='color: red'> Introduce la contraseña</p>";        
                    }elseif (!patPass()) {
                        echo "<p style='color: red'> Al menos una mayuscula, una minuscula y un número/p>";                         
                    }
                }
                
                ?>
        </p>
        <p>
            <label for="idContraseña2">Repite la contraseña:</label>
            <input type="text" name="pass2" id="idContraseña2" placeholder="Repite contraseña">
            
            <?php
                if (enviado()){
                    if (vacio('pass2')) {
                        echo "<p style='color: red'> Introduce de nuevo la contraseña</p>";            
                    }elseif ($_REQUEST['pass']!=$_REQUEST['pass2']) {
                        echo "<p style='color: red'> Introduce de nuevo la contraseña correctamente</p>";                              
                    }
                }
            ?>
        </p>

        <p>
            <label for="idFecha">Fecha: </label>
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
                    if(vacio('dni')){
                        echo "<p style='color: red'>Introduce DNI</p>";
                    }elseif (!patDNI()) {
                        echo "<p style='color: red'>Introduce DNI correcto</p>";                      
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
                if (enviado()) {
                    if (vacio('mail')) {
                        echo "<p style='color: red'>Introduce Email</p>";
                    }elseif (!patMail()) {
                        echo "<p style='color: red'>Introduce Email correcto</p>";     
                    }
                }
            ?>
        </p>

        <p>
            <label for="idFoto">Imágen de perfil: </label>
            <input type="file" name="foto" id="idFoto">

            <?php
                if (enviado()) {
                    if(!file_exists($_FILES['foto']['tmp_name'])){
                        echo "<p style='color: red'>No existe esta imagen</p>";
                    }elseif (!filesize($_FILES['foto']['name'])) {
                        echo "<p style='color: red'>Imagen vacia</p>";                  
                    }elseif (!patFoto()) {
                        echo "<p style='color: red'>Extension de archivo no soportada</p>";
                    }


                }
                
            ?>

        </p>

        <input type="submit" value="Enviar" name="enviar" class="colorin">

        <br><br>
        <a href="verCodigo.php?fichero=practica09.php" class="colorin">Ver formulario</a>
        <a href="verCodigo.php?fichero=libreria.php" class="colorin">Ver libreria</a>
    </form>
    <?php
       }
    ?>
</body>
</html>