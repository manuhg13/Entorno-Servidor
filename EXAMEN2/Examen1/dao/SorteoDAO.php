<?

    class SorteoDAO extends FactoryBD implements DAO{
        public static function findAll(){
            $sql='select * from sorteo;';
            $datos=array();
            $devuelve=parent::ejecuta($sql,$datos);
            $arraySorteo=array();
            while($obj= $devuelve->fetchObject()){
                $sorteo=new Sorteo($obj->id,$obj->fecha,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5);
                array_push($arraySorteo,$sorteo);
            }
            return $arraySorteo;
        }
        public static function findById($id){
            $sql='select * from sorteo where id=?;';
            $datos=array($id);
            $devuelve = parent::ejecuta($sql,$datos);
            $obj=$devuelve->fetchObject();
            if ($obj) {
                return $sorteo= new Usuario($obj->id,$obj->fecha,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5);
            }else{
                return 'No existe el usuario';
            }
        }
        public static function findByDate($fecha){
            $sql='select * from sorteo where fecha=?;';
            $datos=array($fecha);
            $devuelve = parent::ejecuta($sql,$datos);
            $obj=$devuelve->fetchObject();
            if ($obj) {
                return $sorteo= new Usuario($obj->id,$obj->fecha,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5);
            }else{
                return 'No existe el usuario';
            }
        }
        public static function delete($id){
            $sql='delete from sorteo where id=?;';
            $datos=array($id);
            $devuelve=parent::ejecuta($sql,$datos);  
            if ($devuelve->rowCount()==0){
                return 'No ha borrado';
            }else{
                return 'Borrado';
            }        
            
        }
        public static function insert($objeto){
            $sql='insert into sorteo values (?,?,?,?,?,?,?)';
            $objeto=(array)$objeto;
            $datos=array();
            foreach ($objeto as $att) {
                array_push($datos,$att);
            }
            $devuelve=parent::ejecuta($sql,$datos);
            if ($devuelve->rowCount()==0){
                return false;
            }else{
                return true;
            }
        }
        //CAMBIAR
        public static function update($obj){
            $sql='update sorteo set fecha=?,n1=?,n2=?,n3=?,n4=?,n5=? where id=?';
            $datos=array($obj->fecha,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5,$obj->id);
            $devuelve=parent::ejecuta($sql,$datos);
            if ($devuelve->rowCount()==0){
                return false;
            }else{
                return true;
            }
        }

        
    }
?>