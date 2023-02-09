<?

//Si se ha enviado un usuario vamos a comprobarlo
if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];
    if (isset($_REQUEST['recuerdame'])){
        if (isset($_COOKIE['usuario'])){
            setcookie('usuario',$user);
        }
    }
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
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['roles'] = $usuario->perfil;
            //Guardamos la vista de home
            if (esAdmin()){
                $_SESSION['vista'] = $vistas['admin'];
                $_SESSION['controlador'] = $controladores['admin'];
            }elseif(esNormal()){
                $_SESSION['vista'] = $vistas['user'];
                $_SESSION['controlador'] = $controladores['user'];
            }
            //Y volvemos al index
            header('Location: ./index.php');
        }
    }
}
