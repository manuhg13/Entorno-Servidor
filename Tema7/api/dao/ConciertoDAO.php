<?
    //require_once './dao/FactoryBD.php';
    class ConciertoDAO extends FactoryBD implements DAO{
        
        public static function findAll(){
            $sql='select * from conciertos';
            $datos=array();
            $devuelve=parent::ejecuta($sql,$datos);
            $arrayCociertos=$devuelve->fetchAll(PDO::FETCH_ASSOC);
            return $arrayCociertos;
        }

        public static function findById($id){
            $sql='select * from conciertos where id=? ;';
            $datos=array($id);
            $devuelve = parent::ejecuta($sql,$datos);
            $obj=$devuelve->fetch(PDO::FETCH_ASSOC);
            if ($obj) {
                return $obj;
            }else{
                return 'No existe el concierto';
            }
        }

        public static function findByFecha($fecha){
            $sql='select * from conciertos where fecha > ? ;';
            $datos=array($fecha);
            $devuelve = parent::ejecuta($sql,$datos);
            $arrayCociertos=$devuelve->fetchAll(PDO::FETCH_ASSOC);
            return $arrayCociertos;
            
        }

        public static function findOrderByFecha($orden){
            $sql='select * from conciertos order by fecha '.$orden;
            $datos=array();
            $devuelve = parent::ejecuta($sql,$datos);
            $arrayCociertos=$devuelve->fetchAll(PDO::FETCH_ASSOC);
            return $arrayCociertos;
            
        }
        public static function findByFechaOrder($fecha,$orden){
            $sql='select * from conciertos where fecha > ? order by fecha '.$orden;
            $datos=array($fecha);
            $devuelve = parent::ejecuta($sql,$datos);
            $arrayCociertos=$devuelve->fetchAll(PDO::FETCH_ASSOC);
            return $arrayCociertos;
            
        }

        public static function delete($id){
            $sql='delete from conciertos where id=?;';
            $datos=array($id);
            $devuelve=parent::ejecuta($sql,$datos);  
            if ($devuelve->rowCount()==0){
                return false;
            }else{
                return true;
            }           
        }

        public static function insert($objeto){
            $sql='insert into conciertos values (?,?,?,?,?)';
            $objeto=(array)$objeto;
            $datos=array();
            foreach ($objeto as $att) {
                array_push($datos,$att);
            }
            $datos[0]=null;
            $devuelve=parent::ejecuta($sql,$datos);
            if ($devuelve->rowCount()==0){
                return false;
            }else{
                return true;
            }
        }

        public static function update($obj){
            $sql='update conciertos set grupo=?,fecha=?,precio=?,lugar=? where id=?';
            $datos=array($obj->grupo,$obj->fecha,$obj->precio,$obj->lugar,$obj->id);
            $devuelve=parent::ejecuta($sql,$datos);
            if ($devuelve->rowCount()==0){
                return false;
            }else{
                return true;
            }
        }
    }


?>