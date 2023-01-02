<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo usuario</title>
</head>
<body>
    <form action="./registro.php" method="post">
        <p>
                <label for="idUser">User</label>
                <input type="text" name="user" id="user" placeholder="Usuario" value="<?php
                    if (enviado() && !vacio("user")) {
                        echo $_REQUEST['user'];
                    }
                ?>">
                <?php
                    if (vacio("user") && enviado()){
                        echo "<p style='color: red'> Introduce el usuario</p>";
                    }
                ?>
        </p>

        <p>
            <label for="idContraseña">Contraseña: </label>
            <input type="text" name="pass" id="idContraseña" placeholder="Contraseña">
                
            <?php
                if (enviado()) {
                    if (vacio('pass')) {
                        echo "<p style='color: red'> Introduce la contraseña</p>";        
                    }elseif (!patPass()) {
                        echo "<p style='color: red'> Al menos una mayuscula, una minuscula y un número/p>";                         
                    }
                }
                    
            ?>
        </p>

        <p>
            <label for="idContraseña2">Repite la contraseña: </label>
            <input type="text" name="pass2" id="idContraseña2" placeholder="Repite contraseña">
            
            <?php
                if (enviado()){
                    if (vacio('pass2')) {
                        echo "<p style='color: red'> Introduce de nuevo la contraseña</p>";            
                    }elseif ($_REQUEST['pass']!=$_REQUEST['pass2']) {
                        echo "<p style='color: red'> Introduce de nuevo la contraseña correctamente</p>";                              
                    }
                }
            ?>
        </p>

        <p>
            <label for="idEmail">Email: </label>
            <input type="text" name="mail" id="idEmail" placeholder="Email" value="<?php
                if (enviado() && !vacio('mail')) {
                    echo $_REQUEST['mail'];
                }
            ?>">

            <?php
                if (enviado()) {
                    if (vacio('mail')) {
                        echo "<p style='color: red'>Introduce Email</p>";
                    }elseif (!patMail()) {
                        echo "<p style='color: red'>Introduce Email correcto</p>";     
                    }
                }
            ?>
        </p>
    </form>
</body>
</html>