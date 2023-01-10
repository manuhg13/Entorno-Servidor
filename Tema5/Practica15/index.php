<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="CSS/principal.css">-->
    <link href="./CSS/bootstrap.min.css" rel="stylesheet">
    <title>INICIO || PR 15</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./CSS/headers.css" rel="stylesheet">
</head>
<body>
    <?

    require("Funciones/conexionBD.php");
    require("Funciones/funciones.php");

    $NoHabia=false;
    try {
        $conexion=new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
        
        $consulta= $conexion->query("SELECT * FROM productos");

        $arrayJamones=array();

        while ($fila= $consulta->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayJamones,$fila);
        }


    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión";
        }       
        if ($ex->getCode()==1049){
            $NoHabia=true;
            $script=anadirBBDD();
            $conexion2= new PDO('mysql:host='. $_SERVER['SERVER_ADDR'] ,USER,PASS);
            
            $conexion2->exec($script);

        }      
    }
    ?>
    <?
        if($NoHabia){
            try {
                $conexion=new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);

                $consulta= $conexion->query("SELECT * FROM productos");

                $arrayJamones=array();

                while ($fila= $consulta->fetch(PDO::FETCH_ASSOC)) {
                    array_push($arrayJamones,$fila);
                }

                
            } catch (Exception $ex) {
                if ($ex->getCode()==1045){
                    echo "Credenciales incorrectas";
                }
                if ($ex->getCode()==2002){
                    echo "Acabado tiempo de conexión";
                }       
                if ($ex->getCode()==1049){
                    echo "No hay BBDD";
        
                }      
            }
        }
    ?>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
        </ul>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>


    <header>
        <div class="logo">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="botones">
            /*<?
                session_start();
                if (estaValidado()) {
                    echo '<a href="./Paginas/perfil.php" class="boton">'.$_SESSION['user'].'</a>';
                    echo '<a href="./sesiones/logout.php" class="boton">Cerrar sesión</a>';
                }else {
                    
                
            ?>
                <a href="./sesiones/login.php" class="boton">Iniciar sesion</a>
                <a href="./sesiones/registro.php" class="boton">Registrarse</a>
            <?
                }
            ?>
        </div>
    </header>-->
    <nav>
        <ul>
            <li><a href="./index.php" class="activo">Inicio</a></li>
            <li><a href="./index.php">Tienda</a></li>
            <li><a href="./index.php">Ayuda</a></li>
        </ul>
    </nav>
    <div class="ordenar">
        
        <main>            
            <section>
                
                <?
                    foreach ($arrayJamones as $jamon) {
                        echo "<article>";
                            echo '<img src="'. $jamon['url'].'" alt="fotoJamón">';
                            echo '<h3>'. $jamon['nombre']. '</h3>';
                            echo '<p>Precio: '.$jamon['precio'].'€</p>';
                            echo '<a href="./Paginas/producto.php?id='.$jamon['idProducto'].'" class="boton">COMPRAR YA</a>';                        
                        echo "</article>";
                    }

                ?>
            </section>
        </main>
    </div>
</body>
</html>