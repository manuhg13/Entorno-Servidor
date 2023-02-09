<?
    class numeroController extends FatherController{
        public function controlar(){
            $metodo=$_SERVER['REQUEST_METHOD'];
            switch ($metodo) {
                case 'GET':
                    $this->buscar();
                    break;
                default:
                    # code...
                    break;
            } 
        }

        public function buscar(){
            $parametros=$this->parametros();
            $recurso=self::recurso();
            //recurso numeros y nada despues 
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

                    if (isset($_GET['min']) && isset($_GET['max']) && count($_GET)==2) {
                        $premiados=array();
                        for ($i=0; $i < 5; $i++) { 
                           array_push($premiados,random_int($_GET['min'],$_GET['max']));
                        }
                        $data=json_encode($premiados);
                            self::respuesta(
                                $data,
                                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                            );
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
    }

?>