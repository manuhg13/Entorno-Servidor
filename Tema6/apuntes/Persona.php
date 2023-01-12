<?
    class Persona{
        private $nombre;
        private $edad;
        private $email;
        /*----------------------*/ 
        
        public function __construct()
        {
            
        }



        /*----------------------*/ 
        public function getNombre(){
            return $this->nombre;
        }
        public function getEdad(){
            return $this->edad;
        }
        public function getEmail(){
            return $this->email;
        }

        /*----------------------*/ 

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function setEdad($edad){
            $this->edad=$edad;
        }
        public function setEmail($email){
            $this->email=$email;
        }
    }
?>