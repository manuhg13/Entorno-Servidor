<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/principal.css">
    <link href="./CSS/bootstrap.min.css" rel="stylesheet">
    <link href="./CSS/headers.css" rel="stylesheet">
    <link href="./CSS/carousel.css" rel="stylesheet">
    <title>INICIO || PR 15</title>
 
   
</head>
<body style="background-color: #fadcdc;">

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
</svg>

    <?

    require("./seguro/conexionBD.php");
    require("./Funciones/funciones.php");
    

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

    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
            <a href="./index.php" class="d-flex align-items-center col-md-3 ms-lg-4 ms-md-4 mb-md-0 text-dark text-decoration-none">
                <img src="img/logo.png" alt="logo">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="./index.php" class="nav-link px-2 link-danger" >Inicio</a></li>
            <li><a href="./Paginas/tienda.php" class="nav-link px-2 link-light">Tienda</a></li>
            <li><a href="./verCodigo.php?fichero=index.php" class="nav-link px-2 link-light">Ver código</a></li>
            
            </ul>
                <?
                    session_start();
                    if (estaValidado()) {
                    echo '<div class="dropdown col-md-3 text-center me-lg-4 me-md-4">
                            <p>Hola '.$_SESSION['user'].'!</p>
                            <a href="#" class="d-block link-danger text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24" style="color: white;"><use xlink:href="#people-circle"/></svg>
                            </a>
                            <ul class="dropdown-menu text-small">
                                <li><a class="dropdown-item" href="./Paginas/perfil.php">Perfil</a></li>';
                                if (esAdmin() || esModerador()) {
                                    echo '<li><a class="dropdown-item" href="./Paginas/almacen.php">Almacen</a></li>
                                    <li><a class="dropdown-item" href="./Paginas/ventas.php">Ventas</a></li>';
                                }
                                
                    echo  '<li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="./logout.php">Cerrar sesión</a></li>
                            </ul>
                        </div>';
                    }else {
                        
                        ?>
                        <div class="col-md-3 text-end me-lg-4 me-md-4">
                            <a href="./login.php"><button type="button" class="btn btn-light text-dark me-2">Login</button></a>
                            <a href="./registro.php"><button type="button" class="btn btn-primary" style="background-color:#ca3925; border: 1px solid black;">Resgistrarse</button></a>
                        </div>
                            
                        <?
                    }
                ?>
            
    </header>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img/cerdis.jpg" alt="Los Angeles" class="d-block w-100">
        <div class="container">
            <div class="carousel-caption text-start">
            <h1>Criados con cariño</h1>
        </div>
    </div>
      </div>
      <div class="carousel-item">
      <img src="./img/dehesa.jpg" alt="Los Angeles" class="d-block w-100">

        <div class="container">
          <div class="carousel-caption">
            <h1>100% raza Iberica</h1>
            <p>Alimentados en las mejores dehesas</p>
            <p><a class="btn btn-lg btn-primary" href="#">Leer más</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="./img/curando.jpg" alt="curando Jamones" class="d-block w-100">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Proceso de curacion natural</h1>
            <p>Al más puro estilo tradicional</p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    
    
  <div class="ordenar">
        <h1>Los más deseados</h1>
        
        <main>            

            <section class="album py-5">
        <section class="container">
            <section class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>
            <?php
                foreach($arrayJamones as $jamon) {
                    if ($jamon['precio']>=100) {     
                    echo "<section class='col'>";
                        echo "<section class='card shadow-sm'>";
                        echo "<img src='".$jamon['url']."' width='100%' height='450'>";
                        echo "<section class='card-body bg-dark'>";
                            echo "<h3 class='h3 text-light'>".$jamon['nombre']."</h3>";
                            echo "<p class='card-text text-light'>".$jamon['descripcion']."</p>";
                            echo "<section class='d-flex justify-content-between align-items-center'>";
                            echo "<section class='btn-group'>";
                            echo '<a href="./producto.php?id='.$jamon['idProducto'].'"><button type="button" class="btn btn-primary" style="background-color:#ca3925; border: 1px solid black;">Comprar</button></a>';
                            echo "</section>";
                            echo "<small class='text-light'>".$jamon['precio']."€</small>";
                            echo "</section>";
                            echo "</section>";
                            echo "</section>";
                        echo "</section>";                   
                    }
                }
            ?>
            </section>
        </section>
    </section>
            <script src="./JS/bootstrap.bundle.min.js"></script>
        </main>
    </div>
</body>
</html>