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
    <title>Gestion de productos</title>
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
        $operacion=$_REQUEST['op'];
        if (enviado()) {
            if ($_REQUEST['op']=='edi') {
                if (validarProducto()) {
                    actualizarProducto();
                    header("Location: ./almacen.php");
                    exit;
                }
            }elseif($_REQUEST['op']=='nue'){
                if (validarProducto()) {
                    nuevoProducto();
                    header("Location ./almacen.php");
                    exit;
                }
            }
        }elseif ($operacion=='edi') {
            $jamon=findById($_REQUEST['id'],'productos');
        }
        
        
    ?>

    <div class="ordenar">
        <div class="caja" style="text-align: center; margin: 7px">
            <form action="./gestionProductos.php" method="post">
                <input type="hidden" name="op" value="<?
                    echo $operacion;
                ?>">
                <?
                    if ($operacion=='edi') {
                        echo '<label for="id" class="form-label">Id</label>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Id" aria-label="id" name="id" value="'.$_REQUEST['id'].'" readonly>
                        </div>';
                    }
                ?>
                
                
                <label for="nombre" class="form-label">Nombre</label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="nombre" aria-label="nombre" name="nombre" value="<?php
                        if ($operacion=='edi') {
                            echo $jamon[0]['nombre'];
                        }
                    ?>" <?
                        if ($operacion=='edi') {
                            echo ' readonly';
                        }
                    ?>>
                    <?
                        if (enviado() && $operacion=='nue') {
                            if (vacio('nombre')) {
                                echo '<div class="invalid-feedback">Introduce un nombre</div>';
                            }
                        }
                    ?>
                </div>
                <label for="precio" class="form-label">Precio</label>
                <div class="form-floating">
                    <input type="number" step="0.01" class="form-control" id="precio" placeholder="precio" name="precio" value="<?php
                        if ($operacion=='edi') {
                            echo $jamon[0]['precio'];
                        }
                    ?>">

<?
                        if (enviado() && $operacion=='nue') {
                            if (vacio('precio')) {
                                echo '<div class="invalid-feedback">Introduce un precio</div>';
                            }
                        }
                    ?>
                </div>
                <label for="descripcion" class="form-label">Descripcion</label>
                <div class="form-floating">
                    <textarea class="form-control" id="descripcion" rows="3" name="descripcion"><? if ($operacion=='edi'){
                        echo $jamon[0]['descripcion'];
                    }?></textarea>
                    
                    <?
                        if (enviado() && $operacion=='nue') {
                            if (vacio('nombre')) {
                                echo '<div class="invalid-feedback">Introduce una descripción</div>';
                            }
                        }
                    ?>
                </div>
                <label for="stock" class="form-label">Stock</label>
                <div class="form-floating">
                    <input type="number" class="form-control" id="stock" placeholder="stock" name="stock" value="<?php
                        if ($operacion=='edi') {
                            echo $jamon[0]['stock'];
                        }
                    ?>" <?
                        if ($operacion=='edi') {
                            echo ' readonly';
                        }
                    ?>>

                    <?
                        if (enviado() && $operacion=='nue') {
                            if (vacio('nombre')) {
                                echo '<div class="invalid-feedback">Introduce el stock</div>';
                            }
                        }
                    ?>
                </div>
                <label for="url" class="form-label">Imagen</label>               
                    <input class="form-control" type="file" id="fichero" name="fichero" <?
                        if ($operacion=='edi') {
                            echo ' disabled';
                        }
                    ?>>
                <?
                    if (enviado() && $operacion=='nue') {
                        if (!file_exists($_FILES['fichero']['tmp_name'])) {
                            echo '<div class="invalid-feedback">No existe esta imagen</div>';
                        }elseif ($_FILES['fichero']['size']==0) {
                            echo '<div class="invalid-feedback">Imagen vacía</div>';      
                        }elseif (!patFoto()) {
                            echo '<div class="invalid-feedback">Extensión de archivo no soportada</div>';      
                        }
                    }
                ?>

                <button type="submit" name="enviar" class="btn btn-danger mt-3">Enviar</button>
            </form>
        </div>
    </div>

    
    <script src="../JS/bootstrap.bundle.min.js"></script>
</body>
</html>