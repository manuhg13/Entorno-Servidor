<?

    class UsuarioDAO extends FactoryBD implements DAO{
        public static function findAll(){
            $sql='select * from usuarios;';
            $datos=array();
            $devuelve=parent::ejecuta($sql,$datos);
            $arrayUsuario=array();
            while($obj= $devuelve->fetchObject()){
                /*echo "<pre>";
                print_r($obj);
                echo "</pre>";*/
                $usuario=new Usuario($obj->usuario,$obj->clave,$obj->nombre,$obj->correo,$obj->perfil);
                array_push($arrayUsuario,$usuario);
            }
            return $arrayUsuario;
        }
        public static function findById($id){
            $sql='select * from usuarios where usuario=?;';
            $datos=array($id);
            $devuelve = parent::ejecuta($sql,$datos);
            $obj=$devuelve->fetchObject();
            if ($obj) {
                return $usuario= new Usuario($obj->usuario,$obj->clave,$obj->nombre,$obj->correo,$obj->perfil);
            }
        }
        public static function delete($id){

        }
        public static function insert(){

        }
        public static function update($objeto){

        }
    }
?>