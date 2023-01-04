<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/estilos.css">
    <title>Document</title>
</head>
<?php

    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/funcionesBD.php');

    try {
        $conexion = new PDO('mysql:host='.$_SERVER['SERVER_ADDR'].';dbname=' .BBDD,USER,PASS);

        $consulta = $conexion->query('select * from Productos');

        $arrayZapa = array();

        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayZapa,$fila);
        }

    } catch(Exception $ex) {
        if ($ex->getCode() == 1049) {
            crearBD();
            header('location: ./index.php');
            exit;
        }
        if ($ex->getCode() == 1045) {
            echo "<span style='color: red;'>El nombre de usuario o la contraseña no es correcto.</span>";
        }
        if ($ex->getCode() == 2002) {
            echo "<span style='color: red;'>Se acabo el tiempo de espera, no hemos podido establecer la conexion.</span>";
            echo $ex->getMessage();
        }
    }

?>

<body>
    <header>
        <section>
            <img src="img/nike.png" alt="logo">
        </section>
        <section class="login">
            <?php
                if(estaValidado()){
                    echo "<a href='#' class='botones'>".$_SESSION['nombre']."</a>";
                    echo "<a href='login/logout.php' class='botones'>Cerrar Sesion</a>";
                } else {
                    ?>
                    <a href="login/login.php" class="botones">Iniciar Sesion</a>
                    <a href="login/registro.php" class="botones">Registro</a>
                    <?
                }
            ?>
        </section>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="paginas/perfil.php">Perfil</a></li>
                <?php
                    if(estaValidado()){
                        if(esModerador() || esAdmin()) {
                            echo "<a href='php/almacen.php' class='botones'>Almacen</a>";
                            echo "<a href='php/ventas.php' class='botones'>Ventas</a>";
                            echo "<a href='php/albaranes.php' class='botones'>Albaranes</a>";
                        }
                    }
                ?>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="caja">
            <?php

                foreach($arrayZapa as $zapas) {
                    if($zapas['stock'] != 0){
                        echo "<article class=''>";
                            echo "<h2>". $zapas['nombre'] ."</h2>";
                            echo "<p>". $zapas['descripcion'] ."</p>";
                            echo "<p>Precio: ". $zapas['precio'] ."</p>";
                            echo "<a href='' class='botones'>Comprar</a>";
                        echo "</article>";
                    }
                }

            ?>
        </section>
    </main>
</body>
</html>