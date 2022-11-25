<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 1 || ManuelHG</title>
</head>
<body>
    <?php
       if (!file_exists('conexiones.xml')){
        $dom= new DOMDocument('1.0','utf-8');
        $dom->formatOutput=true;
 
        $raiz=$dom->createElement("conexiones");
        $dom->appendChild($raiz);
 
        $dom->save('conexiones.xml');
       }
       
       

       /*---------------------------------------------- */

       $conexiones=simplexml_load_file('conexiones.xml');

       
       $noEsta=false;

       if (count($conexiones->children())==0){
        $conexion=$conexiones->addChild('Conexion');
        $conexion->addChild('ip', $_SERVER['REMOTE_ADDR']);
        $conexion->addChild('veces', "0");
        $conexion->addChild('fecha', date("D, j, M, Y, H:i:s +u", strtotime('now')));
       }
       
       foreach ($conexiones as $sesion) {
            if ($sesion->ip==$_SERVER['REMOTE_ADDR']) {
                $noEsta=false;
                $conexion=$sesion;
            }else{
                $noEsta=true;
            }
       }

       if ($noEsta){
            $conexion=$conexiones->addChild('Conexion');
            $conexion->addChild('ip', $_SERVER['REMOTE_ADDR']);
            $conexion->addChild('veces', "0");
            $conexion->addChild('fecha', date("D, j, M, Y, H:i:s +u", strtotime('now')));
       }else{
            $conexion->veces=intval($sesion->veces)+1;
            $conexion->fecha=date("D, j, M, Y, H:i:s +u", strtotime('now'));
       }

       foreach ($conexiones as $sesion) {
            echo "<p><b>IP: </b>" . $sesion->ip ; 
            echo "&nbsp;&nbsp;<b>Veces: </b>" . $sesion->veces;
            echo "&nbsp;&nbsp;<b>Fecha: </b>" . $sesion->fecha . "</p>";
       }

       $conexiones->asXML('conexiones.xml');

       
    ?>

    
</body>
</html>