<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <title>Lee Fichero XML || ManuelHG</title>
</head>
<body>
    <?php
        include_once("../../CSS/cabecera.html");
        include_once("../../CSS/intro.html");
    ?>
    <table border="1">
            <tr>
                <th>Alumno</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th></th>
            </tr>
            <?php
                $notas=simplexml_load_file('notas.xml');
                $j=0;
                foreach($notas as $alumno){
                    echo "<tr>";
                    foreach ($alumno as $dato) {
                        echo "<td>" . $dato . "</td>";                 
                    }
                    echo '<td><a href="./edita.php?indice='. $j++ . '" class="colorin">Editar</td>';
                    echo "</tr>";
                }
            ?>

    </table>
</body>
</html>