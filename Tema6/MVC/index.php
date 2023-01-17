<?
    require_once('./config/configuracion.php');

    /*$arrayUsuarios=UsuarioDAO::findAll();
    echo '<pre>';
    print_r($arrayUsuarios);
    echo '</pre>';*/
    $usuario=UsuarioDAO::findById('u12');
    echo '<pre>';
    print_r($usuario);
    echo '</pre>';


?>