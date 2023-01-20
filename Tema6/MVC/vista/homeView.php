<?
    echo "<h1>INDEX</h1>";

    $arrayProductos=ProductoDAO::findAll();
    ?>
    <div class="album py-5">

    <?
    foreach ($arrayProductos as $producto) {?>
        <div class="card" style="width: 18rem;">
            <img src="<? echo './webroot/'. $producto->url ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><? echo $producto->nombre?></h5>
                <p class="card-text"><? echo $producto->descripcion?></p>
                <input type="hidden" name="idProducto" value="<? echo $producto->idProducto ?>">
                <input type="submit" class="btn btn-primary" value="Ver" name="ver" href="./index.php">
            </div>
        </div>
    <?}?>
    </div>
    <?
?>