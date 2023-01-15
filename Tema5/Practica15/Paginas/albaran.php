<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/formulario.css">
    <link href="../CSS/headers.css" rel="stylesheet">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/cheatsheet.css" rel="stylesheet">

    <style>
        .invalid-feedback{
            display: flex;
        }
    </style>
    <title>Albaran</title>
</head>
<body style="background-color: #fadcdc;">

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
</svg>
<header class="p-3 mb-3 border-bottom">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="../img/logo.png" alt="logo">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="../index.php" class="nav-link px-2 link-danger">Inicio</a></li>
            <li><a href="./tienda.php" class="nav-link px-2 link-light">Tienda</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Ayuda</a></li>
            
            </ul>
                <?
                    require("../seguro/conexionBD.php");
                    require("../Funciones/funciones.php");
                    session_start();
                    if (estaValidado()) {
                    echo '<div class="dropdown text-end">
                            <p>Hola '.$_SESSION['user'].'!</p>
                            <a href="#" class="d-block link-danger text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24" style="color: white;"><use xlink:href="#people-circle"/></svg>
                            </a>
                            <ul class="dropdown-menu text-small">
                                <li><a class="dropdown-item" href="./perfil.php">Perfil</a></li>';
                                if (esAdmin() || esModerador()) {
                                    echo '<li><a class="dropdown-item" href="./almacen.php">Almacen</a></li>
                                    <li><a class="dropdown-item" href="./ventas.php">Ventas</a></li>';
                                }
                                
                    echo  '<li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout.php">Cerrar sesión</a></li>
                            </ul>
                        </div>';
                    }else {
                        
                        ?>
                            <a href="../login.php"><button type="button" class="btn btn-light text-dark me-2">Login</button></a>
                            <a href="../registro.php"><button type="button" class="btn btn-primary" style="background-color:#ca3925; border: 1px solid black;">Resgistrarse</button></a>
                            
                        <?
                    }
                ?>           
</header>

<?
    if (enviado()) {
        if(validarAlbaran()){
            actualizarRegistro();
            header("Location: ./almacen.php");
            exit;
        }
    }else{
        $registro=findById($_REQUEST['id'],'albaran');
    }
    $id=$_REQUEST['id'];
?>

<div class="ordenar">
    <div class="caja" style="text-align: center; margin: 7px">
        <form action="./gestionProductos.php" method="post">
            <input type="hidden" name="op" value="<?
                echo $operacion;
            ?>">
            <label for="id" class="form-label">Id albaran</label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="id" aria-label="id" name="id" value="<?php
                            echo $registro[0]['idAlbaran'];
                    ?>" readonly>
                </div>
            <label for="fecha" class="form-label">Fecha expedición</label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="fecha" aria-label="fecha" name="fecha" value="<?php
                            echo $registro[0]['fechaAlbaran'];
                    ?>">

                    <?php
                        if (enviado()){
                            if (vacio('fecha')) {
                                echo '<div class="invalid-feedback">Introduce una fecha</div>';
                            }elseif (!patFecha()) {
                                echo '<div class="invalid-feedback">Fecha no valida</div>';
                            }
                        }
                    ?>

                </div>
            <label for="idProducto" class="form-label">id Producto</label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="idProducto" aria-label="idProducto" name="idProducto" value="<?php
                            echo $registro[0]['idProducto'];
                    ?>" readonly>
                </div>
            <label for="cantidad" class="form-label">Cantidad</label>
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" placeholder="cantidad" aria-label="cantidad" name="cantidad" value="<?php
                            echo $registro[0]['cantidad'];
                    ?>">

                    <?
                        if (enviado()){
                            if (vacio('cantidad')) {
                                echo '<div class="invalid-feedback">Introduce una cantidad</div>';
                            }
                        }
                    ?>
                </div>
            <label for="usuario" class="form-label">Usuario</label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="usuario" aria-label="usuario" name="usuario" value="<?php
                            echo $registro[0]['usuario'];
                    ?>" readonly>
                </div>

            <button type="submit" name="enviar" class="btn btn-danger mt-3">Enviar</button>
        </form>
    </div>
</div>

    
</body>
</html>