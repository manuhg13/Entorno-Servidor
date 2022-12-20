<?
    session_start();
    require("./BD.php");
    $user=$_REQUEST['user'];
    $pass=$_REQUEST['pass'];
    if (empty($user)) {
        $_SESSION['error']='Debe rellenar el nombre';
        header("Location: ../login.php");
        exit;
    }else{
        if (validaUser($user,$pass)){
            if ($_SESSION['perfil']=='ADM01') {
                header("Location: ../paginas/admin.php");
                exit;
            }else{
                header("Location: ../paginas/index.php");
                exit;
            }
        }else{
            $_SESSION['error']='No existe el usuario';
            header("Location: ../login.php");
            exit;
        }
    }   
   
?>