<?
    class Persona{
        private $nombre;
        private $edad;
        private $email;
        public static $id=0;
        /*----------------------*/ 

        public static function elProximoID(){
            return self::$id +1;
        }
        
        public function __construct($nombre,$edad,$email)
        {
            self::$id= self::$id +1;
            $this->nombre=$nombre;
            $this->edad=$edad;
            $this->email=$email;
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
            return $this->$clave=$valor;
        }

        /*----------------------*/ 


        public function __toString()
        {
            return $this->id.". Nombre: " .$this->nombre. ", edad: " .$this->edad;
        }

        //----------------------

        public function __clone()
        {
            //$this->id=$this->id +1;
        }

        public function __destruct()
        {
           self::$id=self::$id -1;
        }
    }
?>