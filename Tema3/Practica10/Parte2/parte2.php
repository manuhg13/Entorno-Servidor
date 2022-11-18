<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../CSS/estilo.css">
    <title>PR 10 || Parte 2</title>
</head>
<body>
    <?php
        include("../../../CSS/cabecera.html");
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
            $fila=1;
            $todos=array();
                if (($abrir= fopen("notas.csv", "r"))){
                    $j=0;
                    while ($datos = fgetcsv($abrir,filesize('notas.csv'),';')){
                        $num= count($datos);
                        array_push($todos,$datos);
                        echo "<tr>";
                        for ($i=0; $i < $num; $i++) { 
                            echo "<td>" . $datos[$i] . "</td>";
                        }
                        //echo '<td> <input type="submit" name="' . $j++ .'" value="Editar"></td>';
                        echo '<td><a href="./edita.php?numero='. $j++ . '" class="colorin">Editar</td>';
                        echo "</tr>";
    
                    }
                    fclose($abrir);
                }
            ?>
        </table>
</body>
</html>