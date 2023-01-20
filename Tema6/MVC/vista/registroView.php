<div class="container">
    <form action="./index.php" method="post">
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nombre</label>
            <div class="col-8">
                <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Nombre" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Usuario</label>
            <div class="col-8">
                <input type="text" class="form-control" name="user" id="inputName" placeholder="Usuario" >
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Contraseña</label>
            <div class="col-8">
                <input type="pass" class="form-control" name="pass" id="inputName" placeholder="Contraseña" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label"> Repite Contraseña</label>
            <div class="col-8">
                <input type="pass" class="form-control" name="pass2" id="inputName" placeholder="Repite contraseña" >
            </div>
        </div>
        
        
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input type="text" class="form-control" name="email" id="inputName" placeholder="email" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Perfil</label>
            <div class="col-8">
                <input type="text" class="form-control" name="perfil" id="inputName" placeholder="Perfil">
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <input type="submit" class="btn btn-primary" name="guardar" value="Guardar"/>
            </div>
        </div>
    </form>
</div>