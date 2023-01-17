<?
    require_once('./config/configuracion.php');

    /*$usuario=UsuarioDAO::delete('u5');
    echo '<pre>';
    print_r($usuario);
    echo '</pre>';*/
    
    $usuarioNuevo=new Usuario('u5',sha1(1),'Manuel HG','manuhg@gmail.com','ADM01');
    $usuarioNuevo->nombre='Pedro';
    echo UsuarioDAO::update($usuarioNuevo);
    
    $arrayUsuarios=UsuarioDAO::findAll();
    echo '<pre>';
    print_r($arrayUsuarios);
    echo '</pre>';


?>