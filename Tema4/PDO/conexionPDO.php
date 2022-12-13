<?
    require('pdo.php');

    //conexión

    try {
        $conexion= new PDO('mysql:host=' . $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);


        //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
        
        echo 'Funciona';
        echo '<br><br>';
        
        $sql="insert into equipo values('8','Lituania');";
        $sql2="select * from equipo;";
        
        $conexion->exec($sql);
        
        $resultado=$conexion->query($sql2);
        
        echo '<br><br>';

        while ($fila = $resultado->fetch(PDO::FETCH_BOTH)) {
            echo "<pre>";
            print_r($fila);
            echo "</pre>";
        }
    } catch (Exception $ex) {
        if ($ex->getCode()==1045){
            echo "Credenciales incorrectas";
        }
        if ($ex->getCode()==2002){
            echo "Acabado tiempo de conexión IP erronea";
        }       
        if ($ex->getCode()==1049){
            echo "No existe la base de datos no existe";
        }   
    }

?>