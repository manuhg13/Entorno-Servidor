<?php
    
    /*Abrir fichero SI existe 
    Si se va a abrir para lectura con r 
    Comprobar que existe antes*/
    
    //Leer
    if (file_exists('miarchivo.txt')){
        echo "<br> Existe";
    }else{ 
        echo "<br> No existe";
    }


    if (!$fp = fopen('miarchivo.txt','r')){
        echo "<br> Ha habido un problema al abrir el fichero";
    }else{
        // Leer el fichero entero
        $leer= fread($fp,filesize('miarchivo.txt'));

        echo "<br>" . $leer;
        //Es IMPORTANTE cerrarlo
        fclose($fp);
    }

    echo "<br><br>";
    
?>
<?php
    //Leer línea por línea
    if (!file_exists('miarchivo.txt')){
        echo "<br>No existe";
    }else{ 
       if($fp=fopen('miarchivo.txt', 'r')){
            while (($linea=fgets($fp,filesize('miarchivo.txt')))) {
                echo "<br>"  . $linea;
            }
       }
       fclose($fp);
    }
?>

<?php
    echo "<br><br>";
    //ESCRIBIR
    //Abrir fichero con 'w'

    /*if ($fp= fopen('miarchivo.txt','w')){
        $escribir= '08/11/22';
        fwrite($fp,$escribir,strlen($escribir));
        fclose($fp);
    }else{
        echo "<br>No existe";
    }*/

    //Escribir al final
    /*if ($fp= fopen('miarchivo.txt','a')){
        $escribir= ' final';
        fwrite($fp,$escribir,strlen($escribir));
        fclose($fp);
    }else{
        echo "<br>No existe";
    }*/

    echo "<br><br>";
    echo "<h2>Sustituyendo fecha</h2>";

    //Cambiar la fecha de 22 a 2022
    // replace str_replace 
    if($fp=fopen('miarchivo.txt', 'r+')){
        $leer= fread($fp,filesize('miarchivo.txt'));
        $linea=str_replace('22','2022',$leer);
        fseek($fp,0);
        fwrite($fp,$linea,strlen($linea));
        /*while (($linea=fgets($fp,filesize('miarchivo.txt')))) {
            echo "<br>"  . $linea;
        }*/
        fclose($fp);

   }

/*if (file_exists($request['fichero])) {
   header('Location: ./leer.php?fichero='. $_REQUEST['fichero']);
   exit();
}
*/

?>