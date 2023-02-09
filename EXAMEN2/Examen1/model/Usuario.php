<?
    class Usuario{
        private $id;
        private $nombre;
        private $password;
        private $perfil;

        public function __construct($id,$nombre,$password,$perfil)
        {
            $this->id=$id;
            $this->nombre=$nombre;
            $this->password=$password;
            $this->perfil=$perfil;
        }

        public function __get($get)
        {
            //Si la propiedad no existiera retornaría null
            if (property_exists(__CLASS__,$get)) {
                return $this->$get;
            }
            return null;
        }

        public function __set($clave, $valor)
        {
            if (property_exists(__CLASS__,$clave)) {
                return $this->$clave=$valor;
            }
        }


    }
?>