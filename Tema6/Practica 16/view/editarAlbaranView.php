<div class="container">
    <form action="./index.php" method="post" enctype="multipart/form-data">    
        <div class="mb-3 row">
            <label for="idAlbaran" class="col-4 col-form-label">ID</label>
            <div class="col-8">
                <input type="text" class="form-control" name="idAlbaran" id="idProducto" placeholder="idProducto" readonly value="<? echo $registro->idAlbaran ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="fecha" class="col-4 col-form-label">Fecha</label>
            <div class="col-8">
                <input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="<? echo $registro->fechaAlbaran ?>">
            </div>
        </div>
        <?if (isset($_SESSION['albError']['fecha'])){?>
            <div class="invalid-feedback"><? echo $_SESSION['albError']['fecha']?> </div>
        <?}?>
        <div class="mb-3 row">
            <label for="idProducto" class="col-4 col-form-label">Id Producto</label>
            <div class="col-8">
                <input type="text" class="form-control" name="idProducto" id="idProducto" value="<? echo $registro->idProducto ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" value="<? echo $registro->cantidad ?>">
        </div>
        <?if (isset($_SESSION['albError']['cantidad'])){?>
            <div class="invalid-feedback"><? echo $_SESSION['albError']['cantidad']?> </div>
        <?}?>
        <div class="mb-3 row">
            <label for="usuario" class="col-4 col-form-label">Usuario</label>
            <select class="form-select form-select" name="usuario" id="usuario">
            <?
                $usuarios=UsuarioDAO::findAll();
                foreach ($usuarios as $valor) {?>
                    <option value="<? echo $valor->usuario ?>"><? echo $valor->usuario ?></option>
                <?}?>        
            </select>     
        </div>
        
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <input type="submit" name="guardar" class="btn btn-outline-danger mb-1 mt-1" value="Guardar">
            </div>
        </div>
    </form>
</div>