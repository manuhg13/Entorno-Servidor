<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tabla</title>
</head>
<body>
    <?php
        $fila=1;
        $todos=array();
        if (($abrir= fopen("notas.csv", "r"))){
            $j=0;
            while ($datos = fgetcsv($abrir,filesize('notas.csv'),';')){
                array_push($todos,$datos);
            }
            fclose($abrir);
        }
    ?>
    <form action="">
        <p>
            <label for="idAlumno">Alumno</label>
            <input type="text" name="alumno" id="idAlumno" value="<?php
                echo $todos[$_REQUEST['indice']][0];
            ?>">
        </p>
        <p>
            <label for="idNota1">Nota 1</label>
            <input type="text" name="nota1" id="idNota1" value="<?php
                echo $todos[$_REQUEST['indice']][1];
            ?>">
        </p>
        <p>
            <label for="idNota2">Nota2</label>
            <input type="text" name="nota2" id="idNota2" value="<?php
                echo $todos[$_REQUEST['indice']][2];
            ?>">
        </p>
        <p>
            <label for="idNota3">Nota3</label>
            <input type="text" name="nota3" id="idNota3" value="<?php
                echo $todos[$_REQUEST['indice']][3];
            ?>">
        </p>
    </form>
</body>
</html>