<?  

class ControladorPadre{
    //Comprobar el recurso
    public static function recurso(){
        $uri= $_SERVER['PATH_INFO'];
        return $uri;
    }
}



?>