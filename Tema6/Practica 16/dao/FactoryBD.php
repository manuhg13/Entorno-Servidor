<?  
    
    class FactoryBD{

        public static function ejecuta($sql,$datos){
            try {
                //Los datos deben venir siempre como un array
                $con= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
                $preparada= $con->prepare($sql);
                $preparada->execute($datos);

            } catch (Exception $ex) {
                //Si no va pues nulo
                $preparada=null;
                $conexion2= new PDO('mysql:host='. $_SERVER['SERVER_ADDR'] ,USER,PASS);
                $script=file_get_contents('./config/tienda.sql');
                $conexion2->exec($script);
                echo $ex;
            }finally{
                unset($con);
                return $preparada;
            }
        }

    }
?>