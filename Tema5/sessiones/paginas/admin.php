<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<?
    session_start();
    require('../funciones/funciones.php');

    if(!estaValidado() || !esAdmin()){
        header('Location: ../login.php');
        exit;
    }
?>
<body>
    <header>
        <h2><?echo $_SESSION['nombre']?></h2>
        <a href="../logout.php">Log Out</a>
    </header>
    <h1>Administrador</h1>
</body>
</html>