<?
    require("seguro/conexion.php");
    require('funciones/funciones.php');
    require('funciones/funcionesCookies.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./webroot/CSS/estiloPan.css">
    <title>INICIO</title>
</head>
<body>
    <h1>Panadería</h1>
    
    <main>       
        <section class="productos">
            <h3>Todos</h3>
            <?
                $lista=findAll();
                foreach ($lista as $producto) {

                   echo '<article  class="card">';
                   echo '<a href="verProducto.php?cod='.$producto['codigo'].'"><img src="webroot/'.$producto['baja'].'" alt="pan"></a>';
                   echo '<p>'.$producto['nombre'].'</p>';
                   echo '</article>';
                    
                }
            ?>
        </section>

        <section class="vistos">
            <h3>Últimos vistos</h3>
            
            <?
                mostrarUltimos()
            ?>
            
            
        </section>
    </main>
</body>
</html>