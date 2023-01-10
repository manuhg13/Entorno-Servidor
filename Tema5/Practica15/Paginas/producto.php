<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/principal.css">
    <title>Artículo</title>
</head>
<body>
    <?
         require("../Funciones/conexionBD.php");
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

    <header>
        <div class="logo">
            <img src="../img/logo.png" alt="logo">
        </div>
        <div class="botones">
            <?
                session_start();
                if (estaValidado()) {
                    echo '<a href="../sesiones/login.php" class="boton">'.$_SESSION['user'].'</a>';
                    echo '<a href="../sesiones/logout.php" class="boton">Cerrar sesión</a>';
                }else {
                    
                
            ?>
                <a href="../sesiones/login.php" class="boton">Iniciar sesion</a>
                <a href="../sesiones/registro.php" class="boton">Registrarse</a>
            <?
                }
            ?>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../index.php" class="activo">Tienda</a></li>
            <li><a href="../index.php">Ayuda</a></li>
        </ul>
    </nav>
    
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
                                    echo '<a href="../Paginas/carrito.php?id='.$jamon['idProducto'].'" class="boton">COMPRAR YA</a>';                        
                                echo "</article>";
                            }
                        }

                    ?>
                    <input type="submit" name="venta" value="COMPRAR YA">
                </form>
            </section>
        </main>
    </div>


</body>
</html>