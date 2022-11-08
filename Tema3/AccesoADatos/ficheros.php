<?php
    
    /*Abrir fichero SI existe 
    Si se va a abrir para lectura con r 
    Comprobar que existe antes*/
    
    //Leer
    if (file_exists('miarchivo.txt'))
        echo "<br> Existe";
    else 
        echo "<br> No existe";



?>