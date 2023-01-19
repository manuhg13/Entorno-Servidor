<div class="container">
    <form action="./index.php" method="post">
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nombre</label>
            <div class="col-8">
                <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Name" value="<? echo $usuario->nombre?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Usuario</label>
            <div class="col-8">
                <input type="text" class="form-control" name="user" id="inputName" placeholder="Name" value="<? echo $usuario->usuario?>">
            </div>
        </div>

        <?if ($_SESSION['accion']=='editar'){?>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Contraseña</label>
            <div class="col-8">
                <input type="pass" class="form-control" name="pass" id="inputName" placeholder="Name" value="<? echo $usuario->clave?>">
            </div>
        </div>
        <?
            }
        ?>
        
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input type="text" class="form-control" name="email" id="inputName" placeholder="Name" value="<? echo $usuario->correo?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Perfil</label>
            <div class="col-8">
                <input type="text" class="form-control" name="perfil" id="inputName" placeholder="Name" value="<? echo $usuario->perfil?>">
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <?
                    if ($_SESSION['accion']=='editar') {?>
                        <input type="submit" class="btn btn-primary" name="guardar" value="Guardar"/>
                        
                    <?}
                ?>
                <?
                    if ($_SESSION['accion']=='ver') {?>
                        <input type="submit" class="btn btn-primary" name="editar" value="Editar"/>
                        
                    <?}
                ?>
            </div>
        </div>
    </form>
</div>