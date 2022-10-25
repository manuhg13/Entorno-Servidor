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
                if (vacio("nombre") && enviado()){
                    echo "<p style='color: red'> Introduce el nombre</p>";
                }
            ?>
        </p>
    </form>
</body>
</html>