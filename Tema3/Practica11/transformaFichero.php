<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManuelHG || PR 11</title>
</head>
<body>
    <?php
        $todos=array();
        if (($abrir= fopen("notas.csv", "r"))){
            $j=0;
            while ($datos = fgetcsv($abrir,filesize('notas.csv'),';')){
                array_push($todos,$datos);
            }
            fclose($abrir);
        }

        $dom= new DOMDocument("1.0","utf-8");

        $raiz=$dom->createElement("notas");
        $dom->appendChild($raiz);
       
        $i=0;
        foreach ($todos as $alumno) {
            $alumno=$raiz->appendChild($dom->createElement("alumno"));
            
            foreach ($alumno as $dato) {
                if ($i==0) {
                    $alumno->appendChild($dom->createElement("nombre",$dato));
                }
                if ($i==1) {
                    $alumno->appendChild($dom->createElement("nota1",$dato));
                }
                if ($i==2) {
                    $alumno->appendChild($dom->createElement("nota2",$dato));
                }
                if ($i==3) {
                    $alumno->appendChild($dom->createElement("nota3",$dato));
                }
                $i++;
            }
            $i=0; 
        }

        if ($dom->save('notas.xml')){
            echo "Fichero transformado";
        }else{
            echo "No se ha hecho";
        }
        
    ?>
</body>
</html>