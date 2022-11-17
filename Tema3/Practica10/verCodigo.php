<?php
    echo "<h2>Código fichero " . $_GET['fichero'] . "</h2>";
    highlight_file($_GET['fichero']);
?>