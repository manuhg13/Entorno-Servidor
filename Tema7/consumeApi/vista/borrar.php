<div class="container">
    <form action="../controlador/conciertosControlador.php" method="post">
        <div class="mb-3 row">
            <label for="id" class="col-4 col-form-label">ID</label>
           <select name="id" id="id">
                <option value=0> Selecciona un grupo</option>
            <?
                require '../funciones/funciones.php';
                cargarConciertos();
            ?>
           </select>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <input type="submit" class="btn btn-primary" name="accion" value="Borrar"/>
            </div>
        </div>
    
    </form>
</div>