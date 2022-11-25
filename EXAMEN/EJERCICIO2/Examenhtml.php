<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <style>
        *,
        input {
            margin: 10px;
        }
    </style>
    <?php
    require('validador.php');
    $array = array(
        "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
        "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
        "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
    );

    

    ?>
    <form action="./Examenhtml.php" method="post">
        <label for="nombre">Nombre y apellidos:</label> 
        <input type="text" name="nombre" id="nombre" value="<?php
            if (enviado() && !vacio('nombre')){
                echo $_REQUEST['nombre'];
            }
        ?>">
        <?php
            if(enviado()){
                if(vacio('nombre')){
                    echo "<p style='color: red'> Introduce un nombre y apellidos</p>";
                }elseif (!patNombre()) {
                    echo "<p style='color: red'> Introduce bien los datos</p>";    
                }
            }
        ?>
        <br>
       <label for="exp">Expediente</label>
        <input type="text" name="exp" id="exp" value="<?php
            if (enviado() && !vacio('exp')){
                echo $_REQUEST['exp'];
            }
        ?>">

        <?php
            if(enviado()){
                if(vacio('exp')){
                    echo "<p style='color: red'> Introduce nº de expediente</p>";
                }elseif (!patExp()) {
                    echo "<p style='color: red'> Introduce bien los datos</p>";    
                }
            }
        ?>
        <br>
        <label for="curso">Curso:</label>
        <select name="curso" id="curso">
            <option value="no">Selecione una opcion</option>
            <?php
                foreach ($array as $key => $value) {
                    echo "<option value='" . $key . "'>" . $key . "</option>";
                }           
            ?>
        </select>

        <?php
            if (enviado()){
                if ($_REQUEST['curso']=="no"){
                    echo "<p style='color: red'>Selecciona un curso</p>";
                }
            }
        ?>
        <input type="hidden" name="curso2" value="<?php 
            if (enviado()) {
                $_REQUEST['curso'];
            }           
        ?>">
        <br>
        <?php
            if (primeraValidacion()){
                echo "<p>Asignaturas: </p>";
                foreach ($array as $curso => $modulos) {
                    if ($curso==$_REQUEST['curso']){
                        foreach ($modulos as $valor) {
                            echo '<input type="checkbox" name="asignaturas[]" id="' . $valor .'" value="' . $valor .'">';
                            echo "<label for='" . $valor . "'>" . $valor . "</label>";
                            
                        }
                        
                    }
                }
            }
        ?>

        <br><input type="submit" name="Enviado" value="Enviar">
    </form>



</body>

</html>