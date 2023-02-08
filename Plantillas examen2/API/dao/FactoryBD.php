<?  
    //require_once './dao/DAO.php';
    
    class FactoryBD{

        public static function ejecuta($sql,$datos){
            try {
                //Los datos deben venir siempre como un array
                $con= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $preparada= $con->prepare($sql);
                $preparada->execute($datos);

            } catch (Exception $ex) {
                $preparada=null;
                if ($ex->getCode()==2002 || $ex->getCode()==1049){
                    ControladorPadre::respuesta('',array('HTTP/1.1 500 Server Error'));
                }else{
                    ControladorPadre::respuesta('',array('HTTP/1.1 400 Algun parametro esta mal: ' . $ex->getMessage()));
                    
                }  
            }finally{
                unset($con);
                return $preparada;
            }
        }
    }
?>