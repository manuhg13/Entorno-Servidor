

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">idProducto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Stock</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?foreach ($lista as $prod) {?>
                <tr>
                    <input type="submit" name="ver" value="VER">
                    <td scope="row"><? echo $prod['idProducto']; ?></td>
                    <td><? echo $prod['nombre']; ?></td>
                    <td><? echo $prod['precio']; ?></td>
                    <td><? echo $prod['descripcion']; ?></td>
                    <td><? echo $prod['stock']; ?></td>
                    <form action="./index" method="post">
                    <input type="hidden" value="<? echo $prod['idProducto']; ?>">
                    <td><? echo '<input type="submit" name="ver" value="VER">'; ?></td>
                    <td><? echo '<input type="submit" name="editar" value="EDITAR">'; ?></td>
                    <td><? echo '<input type="submit" name="borrar" value="BORRAR">'; ?></td>
                    </form>
                </tr>
            <?}?>
        </tbody>
    </table>
</div>
