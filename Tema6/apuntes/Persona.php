<?
    class Persona{
        private $nombre;
        private $edad;
        private $email;
        private $id;
        /*----------------------*/ 
        
        public function __construct($nombre,$edad,$email)
        {
            $this->id= 1;
            $this->nombre=$nombre;
            $this->edad=$edad;
            $this->email=$email;
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
            echo "se destruye " . $this;
        }
    }
?>