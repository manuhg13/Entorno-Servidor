<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita XML || ManuelHG</title>
</head>
<body>
    <?php
        $notas=simplexml_load_file('notas.xml')
    ?>
    <form action="./editaXML.php" method="POST">
        <input type="hidden" name="indice" value="<?php
            echo $_REQUEST['indice'];
        ?>">
        <p>
            <label for="idAlumno">Alumno: </label>
            <?php
                echo "<p>". $notas->children()[$_REQUEST['indice']][0] . "</p>";
            ?>
        </p>
        <p>
            <label for="idNota1">Nota 1</label>
            <input type="text" name="nota1" id="idNota1" value="<?php
                echo  $notas->children()[$_REQUEST['indice']][1];
            ?>">

            <?php
                if (enviado()) {
                    if(vacio('nota1')){
                        echo "<p style='color: red'>Introduce una nota</p>";
                    }elseif(!patNotas('nota1')){
                        echo "<p style='color: red'>Nota incorrecta</p>";
                    }
                }
                
            ?>
        </p>
        <p>
            <label for="idNota2">Nota2</label>
            <input type="text" name="nota2" id="idNota2" value="<?php
                echo  $notas->children()[$_REQUEST['indice']][2];
            ?>">

            <?php
                if (enviado()) {
                    if(vacio('nota2')){
                        echo "<p style='color: red'>Introduce una nota</p>";
                    }elseif(!patNotas('nota2')){
                        echo "<p style='color: red'>Nota incorrecta</p>";
                    }
                }
                
            ?>
        </p>
        <p>
            <label for="idNota3">Nota3</label>
            <input type="text" name="nota3" id="idNota3" value="<?php
                echo  $notas->children()[$_REQUEST['indice']][3];
            ?>">

            <?php
                if (enviado()) {
                    if(vacio('nota3')){
                        echo "<p style='color: red'>Introduce una nota</p>";
                    }elseif(!patNotas('nota3')){
                        echo "<p style='color: red'>Nota incorrecta</p>";
                    }
                }
                
            ?>
        </p>

        <input type="submit" value="Guardar" name="guardar" class="colorin">
    </form>

</body>
</html>