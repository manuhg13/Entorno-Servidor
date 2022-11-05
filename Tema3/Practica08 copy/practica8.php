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
    <h1>Formulario</h1>
    <?php
        if (validarTodo()){
            echo "<p style='color: red'>Esta todo</p>"; 
            imprimirInfo();
        }else{
    
    ?>
    <form action="./practica8.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idAlfabetico">Alfabético</label>
            <input type="text" name="alfabetico" id="idAlfabetico" placeholder="Nombre" value="<?php
                if (enviado() && !vacio("alfabetico")) {
                    echo $_REQUEST['alfabetico'];
                }
            ?>">
            <?php
                if (vacio("alfabetico") && enviado() && !is_numeric($_REQUEST['alfabetico'])){
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
                if (enviado() && !vacio('alfabeticoOpt')) {
                    if (!is_numeric($_REQUEST['alfabeticoOpt']))
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
        <p>
            <label for="idSelector">Elige una opción</label>
            <select name="selector" id="idSelector">
                <option value="0">Seleccione una opción</option>
                <option value="1">La primera</option>
                <option value="2">La segunda</option>
                <option value="3">La tercera</option>
            </select>
            <?php
                if(existe('selector') && $_REQUEST['selector']==0){
                    echo "<p style='color: red'> Introduce una opción</p>";
                }
            ?>
        </p>
        <p><b>Elige al menos 1 y máximo 3:</b>
        <br>
            <input type="checkbox" name="box[]" id="idCheck1" value="check1" <?php
                if(enviado() && existe('box') && in_array("check1",$_REQUEST['box'])){
                    echo "checked";
                }
            ?>>
            <label for="idCheck1">Check 1</label>
            <input type="checkbox" name="box[]" id="idCheck2" value="check2" <?php
                if(enviado() && existe('box') && in_array("check2",$_REQUEST['box'])){
                    echo "checked";
                }
            ?>>
            <label for="idCheck1">Check 2</label>
            <input type="checkbox" name="box[]" id="idCheck3" value="check3" <?php
                if(enviado() && existe('box') && in_array("check3",$_REQUEST['box'])){
                    echo "checked";
                }
            ?>>
            <label for="idCheck1">Check 3</label>
            <input type="checkbox" name="box[]" id="idCheck4" value="check4" <?php
                if(enviado() && existe('box') && in_array("check4",$_REQUEST['box'])){
                    echo "checked";
                }
            ?>>
            <label for="idCheck1">Check 4</label>
            <input type="checkbox" name="box[]" id="idCheck5" value="check5" <?php
                if(enviado() && existe('box') && in_array("check5",$_REQUEST['box'])){
                    echo "checked";
                }
            ?>>
            <label for="idCheck1">Check 5</label>
            <input type="checkbox" name="box[]" id="idCheck6" value="check6" <?php
                if(enviado() && existe('box') && in_array("check6",$_REQUEST['box'])){
                    echo "checked";
                }
            ?>>
            <label for="idCheck1">Check 6</label>
            
            <?php
                if (!existe('box') && enviado()) {
                    echo "<p style='color: red'> Introduce al menos una opción</p>";
                }else if(cuantos('box')){
                    echo "<p style='color: red'> Introduce máximo 3 opciones</p>";
                }
                ?>
        </p>
        <p>
            <label for="idTelefono">Nº de teléfono:</label>
            <input type="tel" name="telefono" id="idTelefono" value="<?php
                if (enviado() && !vacio("telefono")) {
                    echo $_REQUEST['telefono'];
                }
            ?>">
            <?php
                if (vacio('telefono') && enviado()) {
                    echo "<p style='color: red'> Introduce nº de telefono</p>";    
                }elseif (!telefono('telefono')) {
                    echo "<p style='color: red'> Introduce nº de telefono correcto</p>";
                }
            ?>
        </p>
        <p>
            <input type="file" name="fichero" id="idFichero">
        </p>

        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>