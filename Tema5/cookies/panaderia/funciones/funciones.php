<?  
    
    function findAll(){
        try{
            $conexion=new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            $sql="select * from producto";
            $resultado=$conexion->query($sql);
            $array=$resultado->fetchAll(PDO::FETCH_ASSOC);
           
            unset($conexion);
            return $array;
           
        }catch(Exception $ex){
            print_r($ex);
            unset($conexion);
            return false;
        }
    }

    function findById($id){

    }

?>