<?


    function anadirBBDD(){
        return file_get_contents('./BBDD/tienda.sql');
    }

    /*-----------Sesiones y perfiles---------*/
    function estaValidado(){
        if (isset($_SESSION['validado'])){
            return true;
        }

        return false;
    }
    function esAdmin(){
        if(isset($_SESSION['roles'])){
            if ($_SESSION['roles']=='ADM01'){
                return true;
            }
            return false;
        }
    }
    function esModerador(){
        if(isset($_SESSION['roles'])){
            if ($_SESSION['roles']=='MOD02'){
                return true;
            }
            return false;
        }
    }
    function esNormal(){
        if(isset($_SESSION['roles'])){
            if ($_SESSION['roles']=='NOR03'){
                return true;
            }
            return false;
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

    /*--------------Registro-------------------*/ 
    
    function vacio($dato){
        if (empty($_REQUEST[$dato])) {
            return true;
        }else {
            return false;
        }
    }

    function enviado(){
        if (isset($_REQUEST['enviar']))
            return true;
        return false;
    }
    function existe($nombre){
        if (isset($_REQUEST[$nombre]))
            return true;
        return false;
    }

    function usuarioValido(){
        if(validaSoloUser($_REQUEST['user'])){
            return true;
        }
        return false;
    }
    
    function patMail(){
        $patron='/^.{1,}@.{1,}\..{2,}$/';
        if (preg_match($patron,$_REQUEST['mail'])==1){
            return true;
        }
        return false;
    }

    function patPass(){
        $patron='/(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,}$/';
        if (preg_match($patron,$_REQUEST['pass'])) {
            return true;
        }
        return false;
    }

    function patFecha(){
        $patron='/^\d{4}([\-])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/';
        if(preg_match($patron,$_REQUEST['fecha'])==1){
            $cortado=explode('-',$_REQUEST['fecha']);
            if(checkdate($cortado[1],$cortado[2],$cortado[0])){
                return true;
            }
        }
        return false;
    }

    function validarTodo(){
        if(enviado()){
            if(!vacio('user') && usuarioValido()){
                if(!vacio('pass') && !vacio('pass2') && patPass() && $_REQUEST['pass']==$_REQUEST['pass2']){
                    if (!vacio('mail') && patMail()) {
                        if (!vacio('fecha') && patFecha()) {
                            if (!vacio('nombre')) {
                                if (existe('roles') && $_REQUEST['roles']!=0) {
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
    function validarTodoActualizar(){
        if(enviado()){
            if(!vacio('user')){
                if(!vacio('pass') && !vacio('pass2') && patPass() && $_REQUEST['pass']==$_REQUEST['pass2']){
                    if (!vacio('mail') && patMail()) {
                        if (!vacio('fecha') && patFecha()) {
                            if (!vacio('nombre')) {
                                if (existe('roles') && $_REQUEST['roles']!=0) {
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
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

            $sql="insert into ventas (cliente,fechaVent,idProducto,cantidad,precioTotal) values (:cliente,:fechaVent,:idProducto,:cantidad,:precioTotal);";
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

    function findAll($tabla){
        try{
            $conexion=new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            $sql="select * from ".$tabla.";";
            $resultado=$conexion->query($sql);
            $array=$resultado->fetchAll(PDO::FETCH_ASSOC);
           
            unset($conexion);
            return $array;
           
        }catch(Exception $ex){
            print_r($ex);
            unset($conexion);
            return false;
        }
    }

    function eliminarVenta(){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);

            $orden="delete from ventas where idVenta='" . $_REQUEST['id'] ."';";
            
            $conexion->exec($orden);

        } catch (Exception $ex) {
            if ($ex->getCode()==1045){
                echo "Credenciales incorrectas";
            }
            if ($ex->getCode()==2002){
                echo "Acabado tiempo de conexión";
            }       
            if ($ex->getCode()==1049){
                echo "No existe la base de datos no existe";
            }       
        } 
    }
    function eliminarAlbaran(){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);

            $orden="delete from albaran where idAlbaran='" . $_REQUEST['id'] ."';";
            
            $conexion->exec($orden);

        } catch (Exception $ex) {
            if ($ex->getCode()==1045){
                echo "Credenciales incorrectas";
            }
            if ($ex->getCode()==2002){
                echo "Acabado tiempo de conexión";
            }       
            if ($ex->getCode()==1049){
                echo "No existe la base de datos no existe";
            }       
        } 
    }
    function actualizarStock($nuevo,$cantidad){
        try {
            $conexion= new PDO('mysql:host='. $_SERVER['SERVER_ADDR']. ';dbname=' .BBDD,USER,PASS);
            
            $orden1="update productos set stock='".$nuevo."' where idProducto='" . $_REQUEST['id'] ."';" ;
            $orden2="insert into albaran (fechaAlbaran,idProducto,cantidad,usuario) values (:fechaAlbaran,:idProducto,:cantidad,:usuario);" ;
            
            $preparada=$conexion->prepare($orden2);

            $array=array(":fechaAlabaran"=>date('Y-m-d'),":idProducto"=>$_REQUEST['id'],":cantidad"=>$cantidad,":usuario"=>$_SESSION['user']);
            $conexion->exec($orden1);
            $preparada->execute($array);
            

        } catch (Exception $ex) {
            if ($ex->getCode()==1045){
                echo "Credenciales incorrectas";
            }
            if ($ex->getCode()==2002){
                echo "Acabado tiempo de conexión";
            }       
            if ($ex->getCode()==1049){
                echo "No existe la base de datos no existe";
            }       
        }
    }

?>