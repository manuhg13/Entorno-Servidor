<?
    class ConciertosControlador extends ControladorPadre{
        public static function controlar(){
            $metodo=$_SERVER['REQUEST_METHOD'];
            switch ($metodo) {
                case 'GET':
                    self::buscar();
                    break;
                case 'POST':
                    self::insertar();
                    break;
                
                case 'PUT':
                    self::modificar();
                    break;
                
                case 'DELETE':
                    self::borrar();
                    break;
                
                default:
                    # code...
                    break;
            } 
        }

        public function buscar(){
            $parametros=$this->parametros();
        }
        public function insertar(){
            $parametros=$this->parametros();
        }
        public function modificar(){
            $parametros=$this->parametros();
        }
        public function borrar(){
            $parametros=$this->parametros();
        }
    }

?>