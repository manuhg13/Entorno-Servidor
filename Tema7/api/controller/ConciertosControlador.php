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
                
                case 'PATCH':
                    $this->editar();
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

                    if (isset($_GET['fecha']) && isset($_GET['ordenF']) && count($_GET)==2) {
                        $concierto=ConciertoDAO::findByFechaOrder($_GET['fecha'],$_GET['ordenF']);
                        $data=json_encode($concierto);
                            self::respuesta(
                                $data,
                                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                            );
                    }elseif (isset($_GET['fecha'])) {
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
            $body=file_get_contents('php://input');
            $dato=json_decode($body);
            if(isset($dato->grupo) && isset($dato->fecha) && isset($dato->precio) && isset($dato->lugar)){
                $concierto= new Concierto($dato->grupo,$dato->fecha,$dato->precio,$dato->lugar);
                if ( ConciertoDAO::insert($concierto)) {
                    self::recurso(
                        [],
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
            }
            }else {
                self::respuesta(
                    '',
                    array('HTTP/1.1 404 No se ha introducido')
                );
            }
           
            print_r($dato);
        }
        public function modificar(){
            $recurso=self::recurso();
            if(count($recurso)==3){
                $body=file_get_contents('php://input');
                $dato=json_decode($body);
                if(isset($dato->grupo) && isset($dato->fecha) && isset($dato->precio) && isset($dato->lugar)){
                    $concierto= new Concierto($dato->grupo,$dato->fecha,$dato->precio,$dato->lugar);
                    $concierto->id=$recurso[2];
                    ConciertoDAO::update($concierto);
                }
            }else{
                self::respuesta(
                    '',
                    array('HTTP/1.1 404 El recurso está mal fomado /concientos/id')
                );
            }
        }
        public function borrar(){
            $recurso=self::recurso();
            if(count($recurso)==3){
                if(ConciertoDAO::delete($recurso[2])){
                    self::recurso(
                        [],
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }else{
                    self::respuesta(
                        '',
                        array('HTTP/1.1 404 El recurso id no existe')
                    );
                }
            }
        }

        public function editar(){
            $recurso=self::recurso();
            if(count(($recurso))==3){
                $concierto=array(ConciertoDAO::findById($recurso[2]));
                $body=file_get_contents('php://input');
                $dato=json_decode($body);
                print_r($dato);
            }
        }
    }

?>