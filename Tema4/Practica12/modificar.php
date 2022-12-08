<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <?
        require('./Funciones/funcionesBD.php');
        
        if ($_REQUEST['op']=='eli'){
            $orden='drop ';
        }elseif ($_REQUEST['op']=='mod' || $_REQUEST['operacion']=='mod') {
            if (enviado()){
                
            }
        }elseif ($_REQUEST['op']=='ins' || $_REQUEST['operacion']=='ins') {
            if (enviado()){

            }
        }

    ?>

    <form action="./modificar.php" method="post">
        <input type="hidden" name="operacion" value="<?
            echo $_REQUEST['op'];
        ?>">

        <input type="text" name="titulo" value="">
        <input type="submit" value="Guardar" name="enviado">

    </form>
</body>
</html>