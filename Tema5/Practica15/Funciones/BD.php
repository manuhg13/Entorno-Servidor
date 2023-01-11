<?
    require('../seguro/conexionBD.php');


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
                $_SESSION['pass']=$pass;
                $_SESSION['nombre']=$row['nombre'];
                $_SESSION['mail']=$row['correo'];
                $_SESSION['fecha']=$row['fecha'];
                $_SESSION['roles']=$row['roles'];

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

    function nuevoUsuario(){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS); 
            $sql="insert into usuarios values (:usuario,:clave,:nombre,:correo,:fecha,:roles);";

            $preparada=$conexion->prepare($sql);
            $array= array(":usuario"=>$_REQUEST['user'],":clave"=>sha1($_REQUEST['pass']),":nombre"=>$_REQUEST['nombre'],":correo"=>$_REQUEST['mail'],":fecha"=>$_REQUEST['fecha'],":roles"=>$_REQUEST['roles']);
            $preparada->execute($array);
        } catch (Exception $ex) {
            print_r($ex);
            unset($conexion);
            
        }
    }
    
    function actualizarUsuario(){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS); 
            $sql="UPDATE usuarios SET clave=:clave,nombre=:nombre,correo=:correo,fecha=:fecha,roles=:roles WHERE usuario=:usuario;";

            $preparada=$conexion->prepare($sql);
            $array= array(":usuario"=>$_REQUEST['user'],":clave"=>sha1($_REQUEST['pass']),":nombre"=>$_REQUEST['nombre'],":correo"=>$_REQUEST['mail'],":fecha"=>$_REQUEST['fecha'],":roles"=>$_REQUEST['roles']);
            $preparada->execute($array);
        } catch (Exception $ex) {
            print_r($ex);
            unset($conexion);
            
        }
    }

    function vendido(){
        try {
            //session_start();
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS); 

            $sql="insert into ventas values (:cliente,:fechaVent,:idProducto,:cantidad,:precioTotal);";
            $sql2="update productos set stock=:stock where idProducto=:idProducto;";
            $nstock=$_REQUEST['stock']-$_REQUEST['cantidad'];

            $preparada=$conexion->prepare($sql);
            $preparada2=$conexion->prepare($sql2);

            $array= array(":cliente"=>$_SESSION['user'],":fechaVent"=>date('Y-m-d'),":idProducto"=>$_REQUEST['id'],":cantidad"=>$_REQUEST['cantidad'],":precioTotal"=> floatval($_REQUEST['precio'])*(floatval($_REQUEST['cantidad'])));
            $array2= array(":idProducto"=>$_REQUEST['id'],":stock"=>$nstock);

            $preparada->execute($array);
            $preparada2->execute($array2);
        } catch (Exception $ex) {
            print_r($ex);
            unset($conexion);
            
        }
    }

    

?>