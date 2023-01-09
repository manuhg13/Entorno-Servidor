<?  
    require("../seguro/conexion.php");
    function findAll(){
        $conexion=new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
    }

?>