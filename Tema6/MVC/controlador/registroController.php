<?
    if ($_REQUEST['guardar']){
        //tooos los campos estan bien 
        //$_SESSION['error'] el motivo de que no vale
        //$nuevo= new Usuario($_REQUEST['user'],sha1($_REQUEST['pass']),$_REQUEST['nombre'],$_REQUEST['email'],'P0001');
        if (UsuarioDAO::insert($nuevo)){
            $_SESSION['controlador']=$controladores['home'];
            $_SESSION['vista']=$vistas['home'];
            $_SESSION['validado']= true;
            $_SESSION['user']= $nuevo->usuario;
            $_SESSION['nombre']= $user->nombre;
            $_SESSION['perfil']= $nuevo->perfil;
        }else {
            $_SESSION['error']='No se ha podido registrar';
        }
    }


?>