<div class="h-100 container-fluid">
    <div class="h-100 row d-flex align-items-stretch">

        <div class="col-12 col-md-7 col-lg-6 col-xl-5 d-flex align-items-start flex-column px-vw-5">

            <div class="mb-auto col-12">
                <h1>Iniciar sesión</h1>

                <form class="row" action="./index.php" method="post">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="user" class="form-label">Usuario</label>
                            <input type="text" class="form-control form-control-lg bg-gray-800 border-dark" id="user" aria-describedby="user" name="user" value="<?
                            if (isset($_COOKIE['usuario'])){
                                echo $_COOKIE['usuario'];
                            }?>">
                        </div>
                        <?if (isset($_SESSION['logError']['user'])){?>
                            <div class="invalid-feedback"><? echo $_SESSION['logError']['pass']?> </div>
                        <?}?>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña</label>
                            <input type="password" class="form-control form-control-lg bg-gray-800 border-dark" id="pass" name="pass">
                        </div>
                        <?if (isset($_SESSION['logError']['pass'])){?>
                            <div class="invalid-feedback"><? echo $_SESSION['logError']['pass']?> </div>
                        <?}?>
                        <div class="form-check mb-3">
                          <input class="form-check-input" type="checkbox" value="recordar" id="recuerdame" name="recuerdame">
                          <label class="form-check-label" for="recuerdame">
                            Recuerdame
                          </label>
                        </div>
                        <input type="submit" class="btn btn-white btn-xl mb-4" name="enviar" value="Inciar sesión">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>