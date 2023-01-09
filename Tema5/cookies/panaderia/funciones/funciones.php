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
        try {
            $conexion=new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            $sql="select * from producto where codigo=?";
            $prepare= $conexion->prepare($sql);
            $resultado=$prepare->execute(array($id));
            if ($resultado) {
                $resultado->fetchAll();
                //return 
            }else{
                return false;
            }
            unset($conexion);
        } catch (\Throwable $th) {
            
        }


    }

?>