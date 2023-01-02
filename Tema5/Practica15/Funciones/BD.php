<?
    require('conexionBD.php');

    function validaUser($user,$pass){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            $sql="select * from usuarios where usuario= ? and clave= ?;";
            $sql_prepa= $conexion->prepare($sql);
            $pass_e=sha1($pass);

            $array= array($user,$pass_e);
            $sql_prepa->execute($array);

            //si devuelve algo hacemos un Login
            if ($sql_prepa->rowCount()==1) {
                session_start();
                $_SESSION['validado']=true;
                $row=$sql_prepa->fetch();
                $_SESSION['user']=$user;
                $_SESSION['nombre']=$row['nombre'];
                $_SESSION['perfil']=$row['roles'];

                unset($conexion);
                return true;
            }else{
                unset($conexion);
                return false;

            }
            //sino pues no hacemos login

        } catch (Exception $ex) {
            print_r($ex);
            unset($conexion);
            
        }
    }
    function validaSoloUser($user){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            $sql="select * from usuarios where usuario= ? ;";
            $sql_prepa= $conexion->prepare($sql);

            $array= array($user);
            $sql_prepa->execute($array);

            //si devuelve algo hacemos un Login
            if ($sql_prepa->rowCount()==0) {
                
                unset($conexion);
                return true;
            }else{
                unset($conexion);
                return false;

            }
            

        } catch (Exception $ex) {
            print_r($ex);
            unset($conexion);
            
        }
    }

    

?>