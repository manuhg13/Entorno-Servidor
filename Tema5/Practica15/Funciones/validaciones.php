<?
    session_start();
    require("./BD.php");
    $user=$_REQUEST['user'];
    $pass=$_REQUEST['pass'];
    if (empty($user)) {
        $_SESSION['error']='Debe rellenar el nombre';
        header("Location: ../login.php");
        exit;
    }
    if (empty($pass)) {
        $_SESSION['error']='Debe rellenar la contraseña';
        header("Location: ../login.php");
        exit;
    }else{
        if (validaUser($user,$pass)){
            if ($_SESSION['roles']=='ADM01') {
                header("Location: ../index.php");
                exit;
            }else{
                header("Location: ../index.php");
                exit;
            }
        }else{
            $_SESSION['error']='No existe el usuario';
            header("Location: ./login.php");
            exit;
        }
    }   
   
?>