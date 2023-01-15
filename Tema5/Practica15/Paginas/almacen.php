<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/headers.css" rel="stylesheet">
    <link href="../CSS/principal.css" rel="stylesheet">
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
    <div class="bd-example m-5">

        <table class="table table-dark table-hover text-aling-center">
            <thead>
              <tr class="aling-text-center">
                <th scope="col">idProducto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Stock</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
    
                <?
                $jamones=findAll('productos');
                
                foreach ($jamones as $valor) {
                    echo "<tr>";
                        echo "<th scope='col'>". $valor['idProducto'] . "</th> ";
                        echo "<td>". $valor['nombre'] . "</td> ";
                        echo "<td>". $valor['precio'] . "</td> ";
                        echo "<td>". $valor['descripcion'] . "</td> ";
                        echo "<td>". $valor['stock'] . "</td> ";
                        echo "<td>";
                        if (esAdmin() || esModerador()) {
                            echo '<form action="./operar.php">
                            <div class="form-group">
                              <input type="number" name="cantidad" class="form-control" size="3" value="1">
                              <input type="hidden" name="op" value="aum">
                              <input type="hidden" name="id" value="'.$valor['idProducto'].'">
                              <input type="hidden" name="stock" value="'.$valor['stock'].'">
                              <button type="submit" name="enviar" class="btn btn-outline-danger mb-1 mt-1">Añadir</button>
                            </div>
                          </form>
                          ';
                        }
                        if (esAdmin()) {
                            echo '<a class="btn btn-danger m-2" href="./operar.php?tabla=productos&op=edi&id='.$valor['idProducto'].'" role="button">Modificar producto</a>';
                        }
                            echo "</td>";     
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
                
        <?
            if (esAdmin()) {
                echo '<a name="nue" id="nue" class="btn btn-danger mb-5" href="./operar.php?op=nue" role="button">Añadir nuevo producto</a>';
            }
        ?>

        <table class="table table-center table-dark table-hover">
            <thead>
              <tr class="aling-text-center">
                <th scope="col">idAlbaran</th>
                <th scope="col">Fecha</th>
                <th scope="col">idProducto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Usuario</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
    
                <?
                $repo=findAll('albaran');
                
                foreach ($repo as $valor) {
                    echo "<tr>";
                        echo "<th scope='col'>". $valor['idAlbaran'] . "</th> ";
                        echo "<td>". $valor['fechaAlbaran'] . "</td> ";
                        echo "<td>". $valor['idProducto'] . "</td> ";
                        echo "<td>". $valor['cantidad'] . "</td> ";
                        echo "<td>". $valor['usuario'] . "</td> ";
                        echo "<td>";
                        if (esAdmin()) {
                            echo '<button type="button" class="btn btn-outline-danger">Modificar registro</button>';
                            echo '<a class="btn btn-danger m-2" href="./operar.php?tabla=albaran&op=eli&id='.$valor['idAlbaran'].'" role="button">Eliminar</a>';
                        }
                        echo "</td>";     
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
    </div>
    
    <script src="../JS/bootstrap.bundle.min.js"></script>
</body>
</html>