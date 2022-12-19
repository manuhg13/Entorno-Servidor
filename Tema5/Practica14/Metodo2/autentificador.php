<?

    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "No autorizado";
    }else{
        switch ($_REQUEST['op']) {
            case 'ins':
                if (($_SERVER['PHP_AUTH_USER']=='manuel' && $_SERVER['PHP_AUTH_PW']=='manuel')|| ($_SERVER['PHP_AUTH_USER']=='admin' && $_SERVER['PHP_AUTH_PW']=='admin')) {
                    header('Location: ../modificar.php?op="'. $_REQUEST['op'].'"');
                    exit;
                }
                break;
            
            case 'mod':
                if (($_SERVER['PHP_AUTH_USER']=='manuel' && $_SERVER['PHP_AUTH_PW']=='manuel')|| ($_SERVER['PHP_AUTH_USER']=='admin' && $_SERVER['PHP_AUTH_PW']=='admin')) {
                    header('Location: ../modificar.php?op="'. $_REQUEST['op'].'"&clave="'. $_REQUEST['clave'].'"');
                    exit;
                }
                break;

            case 'eli':
                if ($_SERVER['PHP_AUTH_USER']=='admin' && $_SERVER['PHP_AUTH_PW']=='admin') {
                    header('Location: ../modificar.php?op="'. $_REQUEST['op'].'"&clave="'. $_REQUEST['clave'].'"');
                    exit;
                }
                break;
            
            default:
                echo "Instruccion incorrecta";
                break;
        }
    }

?>