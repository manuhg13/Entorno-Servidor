<?php
    //Fechas 
    echo "<h2>Fechas y datos especiales</h2>";
    echo time();
    echo "<br><br>";
    date_default_timezone_set('Europe/Madrid');
    echo "<br><br>";
    echo date_default_timezone_get();
    echo "<br><br>";

    echo "Fecha de hoy: ";
    echo date("d-M-Y -- G:i:s");
    
    //Fecha en texto a entero
    echo "<br><br>";
    echo strtotime("now");
    echo "<br><br>";
    //Coge la primera hora del dia como referencia
    echo strtotime("2022-10-4");
    echo "<br><br>";
    echo date("d-M-Y",strtotime("now"));
    
    //MKTime
    echo "<br><br>";
    echo "<h2>MKtime</h2>";
    echo mktime(10,8,21,10,5,2010);
    echo "<br><br>";
    $primera = mktime(0,0,0,1,12,1997);
    $segunda= strtotime("now");
    $dif =  $segunda-$primera;
    echo "<br>";
    echo "He vivido " . ($dif/(60*60*24)) . " días";
    

    echo "<br><br>";
    echo "<h2>Clase DataTime</h2>";
    //Clase DateTime
    $fecha1 = new DateTime("1997-1-12");
    $fecha2 = new DateTime();
    $intervalo = $fecha2->diff($fecha1);
    echo "Años:" . $intervalo->y. " meses:" . $intervalo->m . " dias:" . $intervalo->d;

?>