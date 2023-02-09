<?

//Si se ha enviado un usuario vamos a comprobarlo
if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];
    //Comprobamos el check del recuerdame
    if (isset($_REQUEST['recuerdame'])){
        if (!isset($_COOKIE['usuario'])){
            setcookie('usuario',$user);
        }
    }else{
        setcookie('usuario',$user,time());
    }
    //Comprobacion de errores de formulario
    if (empty($user)) {
        $_SESSION['logError']['user'] = 'Debe rellenar el nombre';
    }

    if (empty($pass)) {
        $_SESSION['logError']['pass'] = 'Debe rellenar la contraseña';
    } else {
        unset($_SESSION['logError']);
        $usuario = UsuarioDAO::valida($user, $pass);
        if ($usuario != null) {
            $_SESSION['validado'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['perfil'] = $usuario->perfil;
            //Guardamos la vista dependiendo de quien entre
            if (esAdmin()){
                $_SESSION['vista'] = $vistas['admin'];
                $_SESSION['controlador'] = $controladores['admin'];
                $_SESSION['pagina'] = 'Admin';
            }elseif(esNormal()){
                $_SESSION['vista'] = $vistas['user'];
                $_SESSION['controlador'] = $controladores['user'];
                $_SESSION['pagina'] = 'Usuario';
            }
            //Y volvemos al index
            header('Location: ./index.php');
        }
    }
}
