<?
    require("./BD.php");
    $user=$_REQUEST['user'];
    $pass=$_REQUEST['pass'];

    if (validaUser($user,$pass)){
        if ($_SESSION['perfil']=='ADM01') {
            header("Location: ../paginas/admin.php");
            exit;
        }else{
            header("Location: ../paginas/index.php");
            exit;
        }
    }else{
        header("Location: ../login.php");
        exit;
    }

   
?>