<?php
    $cadena = 'Hoy hace muy buen día y hay nubes';
    $patron= '/hace/';

    echo "<br> Cadena: " . $cadena . " y patron: " . $patron .  " Match: " . preg_match($patron,$cadena);

    $patron='/ha./';
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match($patron,$cadena);
    
    $patron='/ha.\s/';
    
    echo "<br> Cadena: " . $cadena . " || patron: " . $patron .  " ||Match: " . preg_match($patron,$cadena);






?>