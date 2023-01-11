<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/principal.css">
    <link href="../CSS/headers.css" rel="stylesheet">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/cheatsheet.css" rel="stylesheet">
    
    <title>Nuevo usuario</title>
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
            <li><a href="../index.php" class="nav-link px-2 link-light" >Inicio</a></li>
            <li><a href="./tienda.php" class="nav-link px-2 link-danger">Tienda</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Ayuda</a></li>
            
            </ul>
                <?
                    require("../Funciones/BD.php");
                    require("../Funciones/funciones.php");
                    session_start();
                    if (estaValidado()) {
                    echo '<div class="dropdown text-end">
                            <p>Hola '.$_SESSION['user'].'!</p>
                            <a href="#" class="d-block link-danger text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24" style="color: white;"><use xlink:href="#people-circle"/></svg>
                            </a>
                            <ul class="dropdown-menu text-small">
                                <li><a class="dropdown-item" href="../Paginas/perfil.php">Perfil</a></li>';
                                if (esAdmin() || esModerador()) {
                                    echo '<li><a class="dropdown-item" href="#">Almacen</a></li>
                                    <li><a class="dropdown-item" href="#">Ventas</a></li>';
                                }
                                
                    echo  '<li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="./sesiones/logout.php">Sign out</a></li>
                            </ul>
                        </div>';
                    }else {
                        
                        ?>
                            <a href="../sesiones/login.php"><button type="button" class="btn btn-light text-dark me-2">Login</button></a>
                            <a href="../sesiones/registro.php"><button type="button" class="btn btn-primary" style="background-color:#ca3925; border: 1px solid black;">Resgistrarse</button></a>
                            
                        <?
                    }
                ?>
            
    </header>
    
    <?
        
        require("../Funciones/BD.php");
    ?>
    <?php
        if (validarTodo()){
            nuevoUsuario();
            echo "<p>Todo correcto</p>";
        }else{
    
    ?>
    <form action="./registro.php" method="post">
        
        <label for="idUser" class="form-label">Usuario</label>
        <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" id="idUser" placeholder="Usuario" aria-label="Usuario" name="user" aria-describedby="basic-addon1"value="<?php
                    if (enviado() && !vacio("user")) {
                        echo $_REQUEST['user'];
                    }
                ?>">
                
                <?php
                if (enviado()){
                    if (vacio("user") ){
                        echo "<p style='color: red'> Introduce el usuario</p>";
                    }elseif (!usuarioValido()) {
                        echo "<p style='color: red'>Este usuario ya esta registrado</p>";
                    }                
                }
                ?>
        </div>

        <p>
            <label for="idContraseña">Contraseña: </label>
            <input type="password" name="pass" id="idContraseña" placeholder="Contraseña">
                
            <?php
                if (enviado()) {
                    if (vacio('pass')) {
                        echo "<p style='color: red'> Introduce la contraseña</p>";        
                    }elseif (!patPass()) {
                        echo "<p style='color: red'> Al menos una mayuscula, una minuscula y un número/p>";                         
                    }
                }
                    
            ?>
        </p>

        <p>
            <label for="idContraseña2">Repite la contraseña: </label>
            <input type="password" name="pass2" id="idContraseña2" placeholder="Repite contraseña">
            
            <?php
                if (enviado()){
                    if (vacio('pass2')) {
                        echo "<p style='color: red'> Introduce de nuevo la contraseña</p>";            
                    }elseif ($_REQUEST['pass']!=$_REQUEST['pass2']) {
                        echo "<p style='color: red'> Introduce de nuevo la contraseña correctamente</p>";                              
                    }
                }
            ?>
        </p>

        <p>
            <label for="idNombre">Nombre: </label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php
                if (enviado() && !vacio('nombre')){
                    echo $_REQUEST['nombre'];
                }
            ?>">

            <?php
                if(enviado()){
                    if(vacio('nombre')){
                        echo "<p style='color: red'> Introduce un nombre</p>";
                    }
                }
            ?>
        </p>

        <p>
            <label for="idEmail">Email: </label>
            <input type="text" name="mail" id="idEmail" placeholder="Email" value="<?php
                if (enviado() && !vacio('mail')) {
                    echo $_REQUEST['mail'];
                }
            ?>">

            <?php
                if (enviado()) {
                    if (vacio('mail')) {
                        echo "<p style='color: red'>Introduce Email</p>";
                    }elseif (!patMail()) {
                        echo "<p style='color: red'>Introduce Email correcto</p>";     
                    }
                }
            ?>
        </p>

        <p>
            <label for="idFecha">Fecha: </label>
            <input type="text" name="fecha" id="idFecha" placeholder="dd/mm/aaaa" value="<?php
                if (enviado() && !vacio('fecha')){
                    echo $_REQUEST['fecha'];
                }
            ?>">
            <?php
                if (enviado()){
                    if (vacio('fecha')) {
                        echo "<p style='color: red'>Introduce una fecha</p>";
                    }elseif (!patFecha()) {
                        echo "<p style='color: red'>Fecha no valida</p>";
                    }
                }
            ?>
        </p>

        <p>
            <label for="idSelector">Elige una opción</label>
            <select name="roles" id="idSelector">
                <option value="0">Seleccione una opción</option>
                <option value="ADM01">Administrador</option>
                <option value="MOD02">Moderador</option>
                <option value="NOR03">Usuario normal</option>
            </select>
            <?php
                if(existe('roles') && $_REQUEST['roles']==0){
                    echo "<p style='color: red'> Introduce una opción</p>";
                }
            ?>
        </p>

        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
       }
    ?>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <script src="../JS/cheatsheet.js"></script>
</body>
</html>