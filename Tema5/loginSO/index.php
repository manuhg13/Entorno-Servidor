<?php
    echo " Mi pagina con derecho de admisión";
    echo "<br><br>";
    echo $_SERVER['PHP_AUTH_USER'];
    echo "<br><br>";
    echo $_SERVER['PHP_AUTH_PW'];
    echo "<br><br>";
    echo $_SERVER['AUTH_TYPE'];
?>