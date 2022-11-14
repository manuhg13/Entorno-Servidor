<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fichero</title>
</head>
<body>
    <form action="./leer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fichero" value="<?php
            echo $_REQUEST['fichero'];
        ?>">
        <textarea name="area" id="idArea" cols="30" rows="10"><?php
                if (!file_exists($_REQUEST['fichero'])){
                    if($abierto=fopen($_REQUEST['fichero'],'w')){
                        while($linea=fgets($abierto,filesize($_REQUEST['fichero']))){
                            echo $linea;
                        }
                    }
                }else{
                    if($abierto=fopen($_REQUEST['fichero'],'r+')){
                        while($linea=fgets($abierto,filesize($_REQUEST['fichero']))){
                            echo $linea;
                        }
                    }
                }
            ?>
        </textarea>
        <input type="submit" value="leer" name="leer">
    </form>
</body>
</html>