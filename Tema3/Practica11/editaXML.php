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
        include("../../../CSS/cabecera.html");
        require("validador.php");
        $notas=simplexml_load_file('notas.xml');
    
            if (validarTodo()){               
                    $todos[$_REQUEST['indice']][1]=$_REQUEST['nota1'];
                    $todos[$_REQUEST['indice']][2]=$_REQUEST['nota2'];
                    $todos[$_REQUEST['indice']][3]=$_REQUEST['nota3'];

                    if ($abrir=fopen('notas.csv','w')){
                        foreach($todos as $campos){
                            fputcsv($abrir,$campos,";");
                        }
                    }
                    fclose($abrir);

                    header('Location: ./parte2.php');
                    exit();    
            }else{
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