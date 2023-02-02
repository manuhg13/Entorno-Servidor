
        <div class="card" style="width: 18rem;">
            <img src="<? echo './webroot/'. $producto->url ?>" class="card-img-top" alt="prod">
            <div class="card-body">
                <h5 class="card-title"><? echo $producto->nombre?></h5>
                <p class="card-text"><? echo $producto->descripcion?></p>
                <p class="card-text"><? echo $producto->precio?></p>
                <input type="number" name="stock" value="<? echo $producto->stock ?>">
                <input type="hidden" name="idProducto" value="<? echo $producto->idProducto ?>">
                <input type="submit" class="btn btn-primary" value="Comprar" name="comprar" href="./index.php">
            </div>
        </div>
