<div class='col'>
    <div class='card shadow-sm'>
        <img src='<? echo $jamon->url ?>' width='100%' height='450'>
        <div class='card-body bg-dark'>
            <h3 class='h3 text-light'><? echo $jamon->nombre ?></h3>
            <p class='card-text text-light'><? echo $jamon->descripcion ?></p>
            <div class='d-flex justify-content-between align-items-center'>";
                <small class='text-light'><? echo $jamon->precio ?>€</small>";
                <div class='btn-group'>";
                    <form action="./index.php" method="post">
                        <input type="hidden" name="idProducto" value="<? echo $jamon->idProducto ?>">
                        <select name="cantidad" id="cantidad" class="form-select form-select-sm">
                            <? for ($i=1; $i < $jamon->stock; $i++) {?>
                                <option value="<? echo $i ?>"><? echo $i ?></option>
                            <?}?>
                        </select>
                        <input type="submit" value="Comprar" name="comprar" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>