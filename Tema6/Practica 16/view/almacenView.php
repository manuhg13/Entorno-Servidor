<table class="table table-dark table-hover text-aling-center">
    <thead>
        <tr class="aling-text-center">
            <th scope="col">idProducto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Stock</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($lista as $prod) {?>
            <tr>
            <th scope='col'><? echo $prod['idProducto'] ?></th>
            <td><? echo $prod['nombre'] ?></td> 
            <td><? echo $prod['precio'] ?></td>
            <td><? echo $prod['descripcion'] ?></td>
            <td><? echo $prod['Stock'] ?></td>
            <td>
            <?if (esAdmin() || esModerador()) {?>
                <form action="./index.php" method="post">
                    <div class="form-group">
                        <input type="number" name="cantidad" class="form-control" size="3" value="1">
                        <input type="hidden" name="id" value="<? echo $prod['idProducto'] ?>">
                        <input type="submit" name="aumentar" class="btn btn-outline-danger mb-1 mt-1" value="Añadir">
                    </div>
                             
            <?}
            if (esAdmin()) {?>
                <input type="submit" name="editar" class="btn btn-outline-danger mb-1 mt-1" value="Editar">
           <?}?>
            </td>
            </tr>
        <?}?>
    </tbody>
</table>

<? if (esAdmin()){?>
    <input type="submit" name="nuevo" class="btn btn-outline-danger mb-1 mt-1" value="Añadir nuevo producto">
<?}?>
</form>