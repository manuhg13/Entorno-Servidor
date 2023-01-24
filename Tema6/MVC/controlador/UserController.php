<?
    if (isset($_REQUEST['editar'])) {
        $_SESSION['accion']= 'editar';
        $usuario=UsuarioDAO::findById($_SESSION['user']);
        
    }elseif (isset($_REQUEST['guardar'])) {
        //funcion validaContraseña
        $_SESSION['accion']= 'ver';
        $usuario=UsuarioDAO::findById($_SESSION['user']);
        $usuario->nombre=$_REQUEST['nombre'];
        $usuario->correo=$_REQUEST['email'];
        $usuario->clave=$_REQUEST['pass'];
        $usuario->perfil=$_REQUEST['perfil'];
        if(!UsuarioDAO::update($usuario)) {
           $_SESSION['accion']= 'editar';
        $_SESSION['error']="No Va";
       }
        
    }else{
        $usuario=UsuarioDAO::findById($_SESSION['user']);

    }
?>