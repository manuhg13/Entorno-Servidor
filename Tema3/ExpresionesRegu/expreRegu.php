<?php
    $cadena = 'hoy hace muy buen día y hay nubes';

    $patron= '/hace/';

    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match($patron,$cadena);

    $patron='/ha./';
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match($patron,$cadena);
    
    $patron='/ha.\s/';
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match($patron,$cadena);
    
    $patron='/h[o|a]y/';
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena);

    //---------------------------------------------------------------------------

    $mes='Noviembre';
    $mes1='Novembera';
    $mes2='aNov.';

    $patron='/^Nov[\.|iembre|ember]/';

    echo "<br> Cadena: " . $mes . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$mes);
    echo "<br> Cadena: " . $mes1 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$mes1);
    echo "<br> Cadena: " . $mes2 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$mes2);

    //---------------------------------------------------------------------
    /* con el * de 0 a más 
    ? solo entra el 1º y 2º */ 
    
    $patron='/log[0-9]*.log/';
    $cadena='log.log';
    $cadena1='log1.log';
    $cadena2='log125.log';

    echo "<br><br>";
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena);
    echo "<br> Cadena: " . $cadena1 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena1);
    echo "<br> Cadena: " . $cadena2 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena2);
    
    //IBAN valido
    // Pais 2 letras || 4 nº entidad || 4nº Oficina || 2nº Control || 10nº cuenta
    echo "<br><br>";
    
    $patron= '/^[A-Z]{2}[0-9]{2}(\s)?[0-9]{4}(\s)?[0-9]{4}(\s)?[0-9]{2}(\s)?[0-9]{10}$/';
    $cadena='ES6612100418401234567891';
    $cadena1='ES66 1210 0418 40 1234567891';
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena);
    echo "<br> Cadena: " . $cadena1 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena1);
    
    echo "<br><br>";
    
    
    //NUMERO ENTRE 0-999
    
    $patron= '/^[0-9]{1,3}$/';
    $cadena='0';
    $cadena1="a";
    $cadena2='1000';
    $cadena3='236';
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena);
    echo "<br> Cadena: " . $cadena1 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena1);
    echo "<br> Cadena: " . $cadena2 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena2);
    echo "<br> Cadena: " . $cadena3 . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$cadena3);
    
    // \d numero y \D letra
    //match con <html> <h3> <a> </html> </h3>
    echo "<br><br>";

    $patron='/<\/?[a-z]+\d?>/';
    $html='</html>dentro del html</html>
    <a>dentro del a</a>
    <h1>dentro del titulo</h1>';
    echo "<br> Cadena: " . str_replace('<','&lt', $html ) . " || patron: " . $patron .  " ||Match: " . preg_match_all($patron,$html,$array);
    
    echo "<br><br>";
    //El array tiene que ser de cero
    foreach ($array[0] as $value) {
        echo str_replace('<','&lt', $value ) . "<br>";
    }
    
    $patron='/<?[a-z]+\d?>(.*)<\/[a-z]+\d?>/';
    $html='</html>dentro del html</html>
    <a>dentro del a</a>
    <h1>dentro del titulo</h1>';
    
    echo "<br><br>";
    /* Es suspension
    foreach ($array as $key => $value) {
        foreach ($value as $esto) {
            echo str_replace('<','&lt', $esto ) . "<br>"; 
        }
    }*/
    
    echo "<br><br>";
    
    //Expresiones regulares en arrays
    
    $lista = array('María','Criado','25','Calle Requejo 25','49027');
    $patron ='/^\d{1,3}$/';
    $numeros= preg_grep($patron,$lista);
    print_r($numeros);
    
    echo "<br><br>";
    $sustituir='numero';
    $cambiado=preg_replace($patron,$sustituir,$lista);
    print_r($cambiado);



?>