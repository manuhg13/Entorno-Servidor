<?
    require("seguro/conexion.php");
    require('funciones/funciones.php');
    require('funciones/funcionesCookies.php');

    if(!isset($_REQUEST['cod'])){
        header('Location: ./index.php');
        exit;
    }else{
        $id=$_REQUEST['cod'];
        productoVisto($id);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
    <section class="producto">
        <h1>Producto</h1>
        <?
            $producto=findById($id);
            $producto=$producto[0];
            echo '<article  class="card">';
            echo '<img src="webroot/'.$producto['baja'].'" alt="pan"></a>';
            echo '<p>'.$producto['nombre'].'</p>';
            echo '</article>';
        ?>

    </section>
    <section class="vistos">
            <h3>Últimos vistos</h3>
        </section>
    </main>
</body>
</html>