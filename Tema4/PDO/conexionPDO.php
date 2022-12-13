<?
    require('pdo.php');

    //conexión

    /*try {
        $conexion= new PDO('mysql:host=' . $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);


        //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
        
        echo 'Funciona';
        echo '<br><br>';
        
        $sql="delete * from equipo where id='8';";
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
    }*/

    /*try {
        $conexion= new PDO('mysql:host=' . $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);


        //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
        
        echo 'Funciona';
        echo '<br><br>';
        
        //$sql="insert into equipo values (?,?)";
        $sql2="select * from equipo;";


        //-----------------------------------------------Consulta preparada

        /*$preparada=$conexion->prepare($sql);
        $id=9;
        $nombre='Argentina';
        $preparada->bindParam(1,$id);
        $preparada->bindParam(2,$nombre);
        $preparada->execute();*/
        //-----------------------------------------------------------------------
        /*$resultado=$conexion->query($sql2);
        
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
    }*/
    /*try {
        $conexion= new PDO('mysql:host=' . $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);


        //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
        
        echo 'Funciona';
        echo '<br><br>';
        //Si ponemos los nombres de esta manera y hacemo un array asociativo podemos colocar los nombres de sus claves en los parámetros de la inserción
        $sql="insert into equipo values (:id,:nombre)";
        $sql2="select * from equipo;";


        //-----------------------------------------------Consulta preparada

        /*$preparada=$conexion->prepare($sql);
        $array= array(":id"=>10,":nombre"=>'EEUU');
        
        $preparada->execute($array);*/
        //-----------------------------------------------------------------------
        /*$resultado=$conexion->query($sql2);
        
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
    }*/

    try {
        $conexion= new PDO('mysql:host=' . $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);


        //echo $conexion->getAttribute(PDO::ATTR_CLIENT_VERSION);
        
        echo 'Funciona';
        echo '<br><br>';
        //Si ponemos los nombres de esta manera y hacemo un array asociativo podemos colocar los nombres de sus claves en los parámetros de la inserción
        $sql="select * from equipo where nombre like :nombre";
        $sql2="select * from equipo;";


        //-----------------------------------------------Consulta preparada

        $preparada=$conexion->prepare($sql);

        $array= array(":nombre"=>"%na%");
        
        $preparada->execute($array);

        $preparada->bindColumn(1,$id);
        $preparada->bindColumn(2,$nombre);

        while ($row = $preparada->fetch(PDO::FETCH_BOUND)){
            echo "<br> " . $id. ":" . $nombre;
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