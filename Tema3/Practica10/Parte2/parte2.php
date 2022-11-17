<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR 10 || Parte 2</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Alumno</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th></th>
        </tr>
        <?php
        $fila=1;
            if (($abrir= fopen("notas.csv", "r"))){
                $j=0;
                while ($datos = fgetcsv($abrir,filesize('notas.csv'),';')){
                    $num= count($datos);
                    echo "<tr>";
                    for ($i=0; $i < $num; $i++) { 
                        echo "<td>" . $datos[$i] . "</td>";
                    }
                    echo '<td> <input type="submit" name="editar' . $j++ .'" value="Editar"></td>';
                    echo "</tr>";

                }
            }
        ?>
    </table>
</body>
</html>