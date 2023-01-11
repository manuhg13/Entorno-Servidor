<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/formulario.css">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/headers.css" rel="stylesheet">
    <title>Mi perfil</title>
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
            <li><a href="../index.php" class="nav-link px-2 link-danger" >Inicio</a></li>
            <li><a href="../Paginas/tienda.php" class="nav-link px-2 link-light">Tienda</a></li>
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
                                    echo '<li><a class="dropdown-item" href="#">Almacen</a></li>
                                    <li><a class="dropdown-item" href="#">Ventas</a></li>';
                                }
                                
                    echo  '<li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>
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
    
    <div class="ordenar">
        
    <?
        if (validarTodoActualizar()){
            actualizarUsuario();
            session_destroy();
            validaUser($_REQUEST['user'],$_REQUEST['pass']);
            //session_start();
            echo "<p>Perfil actualizado</p>";
            echo '<a href="../index.php" class="boton">Volver al inicio</a>';
        }else{
    ?>
    <div class="caja" style="text-align: center; margin: 7px">
    <form action="./perfil.php" method="post">
                
        <h1 class="h3 mb-3 fw-normal">Nuevo usuario</h1>
            <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" aria-label="Usuario" name="user" aria-describedby="basic-addon1" readonly value="<?php
                        if (!enviado() && vacio("user")) {
                            echo $_SESSION['user'];
                        }
                    ?>">
                    
                    <?php
                    if (enviado()){
                        if (vacio("user") ){
                            echo '<div class="invalid-feedback">Introduce el usuario</div>';
                        }elseif (!usuarioValido()) {
                            echo '<div class="invalid-feedback">Este usuario ya esta registrado</div>';
                        }                
                    }
                    ?>
            </div>

            <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password"> 
                <label for="floatingPassword">Contraseña</label>  
            
                <?php
                    if (enviado()) {
                        if (vacio('pass')) {
                            echo '<div class="invalid-feedback">Introduce la contraseña</div>';
                        }elseif (!patPass()) {
                            echo '<div class="invalid-feedback">Al menos una mayuscula, una minuscula y un número</div>';
                                                    
                        }
                    }
                        
                ?>
            </div>
            
                <br>
            
            <div class="form-floating">
                
                    <input type="password" name="pass2" class="form-control" id="floatingPassword" placeholder="Password"> 
                    <label for="floatingPassword">Repite contraseña</label>  
                    
                    <?php
                        if (enviado()){
                            if (vacio('pass2')) {
                                echo '<div class="invalid-feedback">Introduce de nuevo la contraseña correctamente</div>';                              
                            }elseif ($_REQUEST['pass']!=$_REQUEST['pass2']) {
                                echo '<div class="invalid-feedback">Introduce de nuevo la contraseña correctamente</div>';                              
                            }
                        }
                    ?>
                
                
            </div>
            
        <br>
            <div class="form-floating">
                <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Nombre" value="<?php
                    if (!enviado() && vacio('nombre')){
                        echo $_SESSION['nombre'];
                    }
                ?>">
                <label for="floatingInput">Nombre</label>
                
                
                <?php
                    if(enviado()){
                        if(vacio('nombre')){
                            echo '<div class="invalid-feedback">Introduce un nombre</div>';
                        }
                    }
                ?>
            
            </div>
            <br>
            
            <div class="form-floating">
            
            <input type="mail" class="form-control" id="floatingInput" name="mail" placeholder="name@example.com" value="<?php
                if (!enviado() && vacio('mail')) {
                    echo $_SESSION['mail'];
                }
            ?>">
            <label for="floatingInput">Email</label>
      
            <?php
                if (enviado()) {
                    if (vacio('mail')) {
                        echo '<div class="invalid-feedback">Introduce Email</div>';     

                    }elseif (!patMail()) {
                        echo '<div class="invalid-feedback">Introduce Email correcto</div>';     
                    }
                }
            ?>
        </div>
        
        <br>
            <div class="form-floating">
                <input type="text" name="fecha" class="form-control" id="floatingInput" placeholder="Fecha" value="<?php
                    if (!enviado() && vacio('fecha')){
                        echo $_SESSION['fecha'];
            }
                ?>">
                <label for="floatingInput">Fecha (aaaa-mm-dd)</label>
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
            <br>

            <div class="form-floating">
                <p>
                    <select name="roles" id="idSelector" class="form-select">
                        <option value="0">Seleccione una opción</option>
                        <option value="ADM01">Administrador</option>
                        <option value="MOD02">Moderador</option>
                        <option value="NOR03">Usuario normal</option>
                    </select>
                    <?php
                        if(existe('roles') && $_REQUEST['roles']==0){
                            echo '<div class="invalid-feedback">Introduce una opción</div>';                        
                        }
                    ?>
                </p>
                
            </div>

        <input type="submit" value="Guardar cambios" name="enviar">
    </form>
    <?
        }
    ?>
    </div>
    <script src="../JS/bootstrap.bundle.min.js"></script>
</body>
</html>