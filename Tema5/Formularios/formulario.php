<?php
    require("../Practica07/funciones7.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="./formulario.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php 
                if (enviado() && !vacio("nombre")) {
                    echo $_REQUEST['nombre'];
                }
            ?>">
            <?php
                if (vacio("nombre") && enviado()){
                    echo "<p style='color: red'> Introduce el nombre</p>";
                }
            ?>
        </p>
        <p>
            <label for="idContraseña">Contraseña</label>
            <input type="password" name="pass" id="idContraseña">
            <?php
                if (vacio("pass") && enviado()){
                    echo "<p style='color: red'> Introduce la contraseña</p>";
                }
            ?>
        </p>
        <p>
            <label for="idMasculino">Hombre</label>
            <input type="radio" name="genero" id="idMasculino" value="masculino">
            <label for="idFemenino">Mujer</label>
            <input type="radio" name="genero" id="idFemenino" value="feminio">

            <?php
                if (!existe("genero") && enviado()){
                    echo "<p style='color: red'> Introduce un género</p>";
                }
            ?>
        </p>
        <p><b>Asignaturas</b>
            <br>
            <label for="idDWES">Desarrollo web servidor</label>
            <input type="checkbox" name="asignaturas[]" id="idDWES" value="DWES">
            <br>
            <label for="idDWEC">Desarrollo web cliente</label>
            <input type="checkbox" name="asignaturas[]" id="idDWEC" value="DWEC">
            <br>
            <?php
                if (!existe("genero") && enviado()){
                    echo "<p style='color: red'> Introduce una asignatura</p>";
                }
            ?>
        </p>
        <p><b>Curso</b>
            <select name="curso" id="idCurso">
                <option value="0">Selecciona opción</option>
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
            </select>
        </p>
        <p>
            <input type="file" name="fichero" id="idFichero">

        </p>
        <input type="submit" value="Enviar" name="enviar">
    </form>
   

</body>
</html>