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
            $recurso=self::recurso();
            //recurso conciertos y nada despues 
            if (count($recurso)==2) {
                if (!$parametros){
                    //Listar 
                    $lista =ConciertoDAO::findAll();
                    $data=json_encode($lista);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                    
                }else {

                    if (isset($_GET['fecha']) && isset($_GET['ordenF'])) {
                        $concierto=ConciertoDAO::findByFechaOrder($_GET['fecha'],$_GET['ordenF']);
                        $data=json_encode($concierto);
                            self::respuesta(
                                $data,
                                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                            );
                    }else{
                        if (isset($_GET['fecha'])) {
                            $concierto=ConciertoDAO::findByFecha($_GET['fecha']);
                            $data=json_encode($concierto);
                            self::respuesta(
                                $data,
                                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                            );
                        }elseif (isset($_GET['ordenF'])) {
                            $concierto=ConciertoDAO::findOrderByFecha($_GET['ordenF']);
                            $data=json_encode($concierto);
                            self::respuesta(
                                $data,
                                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                            );
                            if (($_GET['ordenF']!='ASC') && ($_GET['ordenF']!='DESC')) {
                                self::respuesta(
                                    '',
                                    array('HTTP/1.1 404 No se ha utilizado el filtro correcto')
                                );
                            }
                        }else {
                            self::respuesta(
                                '',
                                array('HTTP/1.1 404 No se ha utilizado el filtro correcto')
                            );
                        }

                    }

                }
            }

            //conciertos y despues id
            if(count($recurso)==3){
                if (!$parametros){
                    $concierto=ConciertoDAO::findById($recurso[2]);
                    $data=json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }
            }
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