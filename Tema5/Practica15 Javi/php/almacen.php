<?php

require("../funciones/conexionBD.php");
require("../funciones/funcionesBD.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../style/estilos.css">
</head>
<body>
    <table border='1'>
        <tr>
            <th>Jugador</th>
            <th>Edad</th>
            <th>PPP</th>
            <th>APP</th>
            <th>RPP</th>
            <th>Fecha debut</th>
            <th>Modificar</th>
            <th>Borrar</th>
        </tr>
        <?php
        try {
            $conexion = new PDO('mysql:host=localhost;dbname='.BBDD, USER, PASS);
            $sql = 'select * from productos';

            $resultado= $conexion->query($sql);

            while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
                echo "<tr>";
                echo "<td>" . $fila["cod_producto"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["descripcion"] . "</td>";
                echo "<td>" . $fila["precio"] . "</td>";
                echo "<td>" . $fila["stock"] . "</td>";
                echo "<td><a href='./../users/edita.php?opc=mod&numeroID=" . $fila["cod_producto"] . "'>Modificar</a></td>";
                echo "<td><a href='./../admin/borrar.php?&numeroID=" . $fila["cod_producto"] . "'>Borrar</a></td>";
                echo "</tr>";
            }
            echo "</table>";

        } catch (Exception $ex) {
            if ($ex->getCode() == 1049) {
                echo "<span style='color: red;'>La base de datos no existe.</span>";
        ?>
                <input type="submit" name="enviar" value="crear BD">
        <?
            }
            if ($ex->getCode() == 1045) {
                echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
                $conexion0->close();
            }
            if ($ex->getCode() == 2002) {
                echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
                $conexion0->close();
            }
        }
        ?>
        <div class="cajalink2">
            <a href="editaBD.php?opc=ins">
                <p>Insertar datos</p>
            </a>
        </div>
        <br>
        <br>
        <h2>Ver codigo:</h2>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=eligeFichero.php">
                <p>Ver codigo eligeFichero</p>
            </a>
        </div>
        <div class="cajalink2">
            <a href="verCodigo.php?valor=editaFichero.php">
                <p>Ver codigo editaFichero</p>
            </a>
        </div>
</body>
</html>