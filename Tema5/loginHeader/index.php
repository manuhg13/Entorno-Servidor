<?php
    if(!isset($_SERVER['PHP_AUTH_USER'])){
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "No autorizado";
    }elseif ($_SERVER['PHP_AUTH_USER']=='manuel' && $_SERVER['PHP_AUTH_PW']=='manuel') {
        header('Location: ./paginaConPermiso.php');
    }else{
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "No autorizado";
    }
    /*echo "<br><br>";
    echo $_SERVER['PHP_AUTH_PW'];
    echo "<br><br>";
    echo $_SERVER['AUTH_TYPE'];*/
?>