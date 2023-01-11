<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén</title>
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
                                    echo '<li><a class="dropdown-item" href="./almacen">Almacen</a></li>
                                    <li><a class="dropdown-item" href="./ventas">Ventas</a></li>';
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
    <div class="bd-example">

        <table class="table table-dark table-hover">
            <thead>
              <tr class="aling-text-center">
                <th scope="col">idVenta</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha de Venta</th>
                <th scope="col">idProducto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">TOTAL</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
    
                <?
                $ventas=findAll('ventas');
                
                foreach ($ventas as $valor) {
                    echo "<tr>";
                        echo "<th scope='col'>". $valor['idVenta'] . "</th> ";
                        echo "<td>". $valor['cliente'] . "</td> ";
                        echo "<td>". $valor['fechaVent'] . "</td> ";
                        echo "<td>". $valor['idProducto'] . "</td> ";
                        echo "<td>". $valor['cantidad'] . "</td> ";
                        echo "<td>". $valor['precioTotal'] . "</td> ";
                        if (esAdmin()) {
                            echo "<td>";
                            echo '<button type="button" class="btn btn-outline-danger">Eliminar</button>';
                            echo '<button type="button" class="btn btn-outline-danger">Modificar</button>';
                            echo "</td>";     
                        }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    
</body>
</html>