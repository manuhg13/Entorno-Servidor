<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/principal.css">
    <title>INICIO || PR 15</title>
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


    <header>
        <div class="logo">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="botones">
            <?
                session_start();
                if (estaValidado()) {
                    echo '<a href="./sesiones/login.php" class="boton">'.$_SESSION['user'].'</a>';
                    echo '<a href="./sesiones/logout.php" class="boton">Cerrar sesión</a>';
                }else {
                    
                
            ?>
                <a href="./sesiones/login.php" class="boton">Iniciar sesion</a>
                <a href="./sesiones/registro.php" class="boton">Registrarse</a>
            <?
                }
            ?>
        </div>
    </header>
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
                            echo '<a href="" class="boton">COMPRAR YA</a>';                        
                        echo "</article>";
                    }

                ?>
            </section>
        </main>
    </div>
</body>
</html>