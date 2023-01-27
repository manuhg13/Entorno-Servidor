<?
    class ConciertosControlador extends ControladorPadre{
        public function controlar(){
            $metodo=$_SERVER['REQUEST_METHOD'];
            switch ($metodo) {
                case 'GET':
                    $this->buscar();
                    break;
                case 'POST':
                    $this->insertar();
                    break;
                
                case 'PUT':
                    $this->modificar();
                    break;
                
                case 'DELETE':
                    $this->borrar();
                    break;
                
                default:
                    # code...
                    break;
            } 
        }

        public function buscar(){
            $parametros=$this->parametros();
            //recurso conciertos y nada despues 
            if (count(self::recurso())==2) {
                if (!$parametros){
                    //Listar 
                    $lista =ConciertoDAO::findAll();
                    print_r($lista);
                }
            }

            //conciertos y despues id
            //if (!$parametros)
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