<?php
    require("validador.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 8 || Manuel Hernández Gómez</title>
</head>
<body>
    <form action="./practica8.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idAlfabetico">Alfabético</label>
            <input type="text" name="alfabetico" id="idAlfabetico" placeholder="Nombre" value="<?php
                if (enviado() && !vacio("alfabetico")) {
                    echo $_REQUEST['alfabetico'];
                }
            ?>">
            <?php
                if (vacio("alfabetico") && enviado() && is_nan($_REQUEST['alfabetico'])){
                    echo "<p style='color: red'> Introduce caracteres no numericos</p>";
                }
            ?>
        </p>
        <p>
            <label for="idAlfabeticoOpt">Alfabético Opcional</label>
            <input type="text" name="alfabeticoOpt" id="idAlfabeticoOpt" placeholder="Nombre" value="<?php
                if (enviado() && !vacio("alfabeticoOpt")) {
                    echo $_REQUEST['alfabeticoOpt'];
                }
            ?>">
            <?php
                if (enviado() && is_nan($_REQUEST['alfabeticoOpt'])) {
                    echo "<p style='color: red'> Introduce caracteres no numericos</p>"; 
                }
            ?>
        </p>
        <p>
            <label for="idAlfaNum">Alfanumérico</label>
            <input type="text" name="alfaNum" id="idAlfaNum" placeholder="Apellido" value="<?php
                if (enviado() && !vacio("alfaNum")) {
                    echo $_REQUEST['alfaNum'];
                }
            ?>">
            <?php
                if (vacio("alfaNum") && enviado()){
                    echo "<p style='color: red'> Introduce el nombre</p>";
                }
            ?>
        </p>
        <p>
            <label for="idAlfaNumOpt">Alfanumérico Opcional</label>
            <input type="text" name="alfaNumOpt" id="idAlfaNumOpt" placeholder="Apellido" value="<?php
                if (enviado() && !vacio("alfaNumOpt")) {
                    echo $_REQUEST['alfaNum'];
                }
            ?>">
        </p>
        <p>
            <label for="idFecha">Fecha</label>
            <input type="date" name="fecha" id="idFecha" value="<?php
                if (enviado() && !vacio("fecha")) {
                    echo $_REQUEST['fecha'];
                }
            ?>">
            <?php
                if (vacio("fecha") && enviado()){
                    echo "<p style='color: red'> Introduce una fecha</p>";
                }
            ?>
        </p>
        <p>
            <label for="idFechaOpt">Fecha Opcional</label>
            <input type="date" name="fechaOpt" id="idFechaOpt" value="<?php
                if (enviado() && !vacio('fechaOpt')) {
                    echo $_REQUEST['fechaOpt'];
                }
            ?>">
        </p>
        <p><b>Radio Obligatorio</b>
            <br>
            <input type="radio" name="radios" id="idRadio1" value="opcion1" <?php
                if (enviado() && existe('radios') && $_REQUEST['radios']=="opcion1") {
                   echo "checked";
                }
            ?>>
            <label for="idRadio1">Opción 1</label>
            <input type="radio" name="radios" id="idRadio2" value="opcion2" <?php
                if (enviado() && existe('radios') && $_REQUEST['radios']=="opcion1") {
                   echo "checked";
                }
            ?>>
            <label for="idRadio2">Opción 2</label>
            <input type="radio" name="radios" id="idRadio3" value="opcion3" <?php
                if (enviado() && existe('radios') && $_REQUEST['radios']=="opcion3") {
                   echo "checked";
                }
            ?>>
            <label for="idRadio3">Opción 3</label>
        </p>
    </form>
</body>
</html>