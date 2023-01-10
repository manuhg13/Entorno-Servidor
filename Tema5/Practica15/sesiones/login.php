<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/formulario.css">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/headers.css" rel="stylesheet">
    <link href="../CSS/signin.css" rel="stylesheet">
    <title>Iniciar Sesión</title>
    <?
        session_start();
    ?>
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
                    require("../Funciones/conexionBD.php");
                    require("../Funciones/funciones.php");
                    if (estaValidado()) {
                    echo '<div class="dropdown text-end">
                            <p>Hola '.$_SESSION['user'].'!</p>
                            <a href="#" class="d-block link-danger text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24" style="color: white;"><use xlink:href="#people-circle"/></svg>
                            </a>
                            <ul class="dropdown-menu text-small">
                                <li><a class="dropdown-item" href="./Paginas/perfil.php">Perfil</a></li>';
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
                            <a href="./sesiones/login.php"><button type="button" class="btn btn-light text-dark me-2">Login</button></a>
                            <a href="./sesiones/registro.php"><button type="button" class="btn btn-primary" style="background-color:#ca3925; border: 1px solid black;">Resgistrarse</button></a>
                            
                        <?
                    }
                ?>
            
    </header>
    
    <br>
    <div class="ordenar">
        <div class="caja">

        <form action="../Funciones/validaciones.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="usuario" name="user">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-danger" type="submit" name="enviar">Aceptar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
            <!--<form action="../Funciones/validaciones.php" method="post">
                <label for="user">Usuario</label>
                <input type="text" name="user" id="idUser">
                <br><br>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="idPass">
                <br><br>
                <input type="submit" value="Enviar" name="enviar" class="boton">
            </form>-->
        <?
            if(isset($_SESSION['error'])){
                echo "<p style='padding: 10px; color: red'>" . $_SESSION['error'] . "</p>";
            }
            unset($_SESSION['error']);
        ?>  
        </div>
    </div>
    <script src="../JS/bootstrap.bundle.min.js"></script>

</body>
</html>