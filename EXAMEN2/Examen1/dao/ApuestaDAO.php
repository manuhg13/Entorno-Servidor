<?

    class ApuestaDAO extends FactoryBD implements DAO{
        public static function findAll(){
            $sql='select * from apuesta;';
            $datos=array();
            $devuelve=parent::ejecuta($sql,$datos);
            $arrayApuestas=array();
            while($obj= $devuelve->fetchObject()){
                $apuesta=new Apuesta($obj->id,$obj->fecha,$obj->idUser,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5);
                array_push($arrayApuestas,$apuesta);
            }
            return $arrayApuestas;
        }
        public static function findById($id){
            $sql='select * from apuesta where idUser=? and fecha=?;';
            $datos=array($id);
            $devuelve = parent::ejecuta($sql,$datos);
            $obj=$devuelve->fetchObject();
            if ($obj) {
                return $apuesta= new Apuesta($obj->id,$obj->fecha,$obj->idUser,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5);
            }else{
                return 'No existe el usuario';
            }
        }
        public static function findByIdDate($id,$fecha){
            $sql='select * from apuesta where idUser=? and fecha=?;';
            $datos=array($id,$fecha);
            $devuelve = parent::ejecuta($sql,$datos);
            $obj=$devuelve->fetchObject();
            if ($obj) {
                return $apuesta= new Apuesta($obj->id,$obj->fecha,$obj->idUser,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5);
            }else{
                return 'No existe el usuario';
            }
        }
        public static function delete($id){
            $sql='delete from apuesta where id=?;';
            $datos=array($id);
            $devuelve=parent::ejecuta($sql,$datos);  
            if ($devuelve->rowCount()==0){
                return 'No ha borrado';
            }else{
                return 'Borrado';
            }        
            
        }
        public static function insert($objeto){
            $sql='insert into apuesta (idUser,n1,n2,n3,n4,n5) values (?,?,?,?,?,?)';
            $datos=array($objeto->idUser,$objeto->n1,$objeto->n2,$objeto->n3,$objeto->n4,$objeto->n5);
            $devuelve=parent::ejecuta($sql,$datos);
            if ($devuelve->rowCount()==0){
                return false;
            }else{
                return true;
            }
        }
        //CAMBIAR
        public static function update($obj){
            $sql='update apuesta set fecha=?,idUser=?,n1=?,n2=?,n3=?,n4=?,n5=? where id=?';
            $datos=array($obj->fecha,$obj->idUser,$obj->n1,$obj->n2,$obj->n3,$obj->n4,$obj->n5,$obj->id);
            $devuelve=parent::ejecuta($sql,$datos);
            if ($devuelve->rowCount()==0){
                return false;
            }else{
                return true;
            }
        }

        
    }
?>