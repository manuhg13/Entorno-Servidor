<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/principal.css">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/headers.css" rel="stylesheet">
    <title>Artículo</title>
</head>
<body style="background-color: #fadcdc;">

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
</svg>
    <?
         require("../seguro/conexionBD.php");
         require("../Funciones/funciones.php");

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
    ?>

    <header class="p-3 mb-3 border-bottom">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="../img/logo.png" alt="logo">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-danger" >Inicio</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Tienda</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Ayuda</a></li>
            
            </ul>
                <?
                    session_start();
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
    
    <div class="ordenar">
        
        <main>            
            <section>
                <form action="./carrito.php">
                    <?
                        foreach ($arrayJamones as $jamon) {
                            if ($jamon['idProducto']==$_REQUEST['id']){
                                echo "<article>";
                                    echo '<img src="../'. $jamon['url'].'" alt="fotoJamón">';
                                    echo '<h3>'. $jamon['nombre']. '</h3>';
                                    echo '<p>Descripcion: '.$jamon['descripcion'].'</p>';
                                    echo '<p>Precio: '.$jamon['precio'].'€</p>';
                                    echo '<p>Quedan: '.$jamon['stock'].' disponibles</p>';
                                    echo '<select name="cantidad" id="idSelector" class="form-select form-select-sm">';
                                        for ($i=1; $i <= $jamon['stock']; $i++) { 
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    echo '</select><br>';
                                    echo '<input type="hidden" name="id" value="'.$jamon['idProducto'].'">';
                                    echo '<input type="hidden" name="precio" value="'.$jamon['precio'].'">';
                                    echo '<input type="hidden" name="stock" value="'.$jamon['stock'].'">';
                                    echo '<input type="submit" name="venta" value="COMPRAR YA">';                        
                                echo "</article>";
                            }
                        }

                    ?>
                </form>
            </section>
        </main>
    </div>

    <script src="../JS/bootstrap.bundle.min.js"></script>
</body>
</html>