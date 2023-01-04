<?php

require("./BD.php");

$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];

if(validaUser($user, $pass)){
    header("location: ../index.php");
    exit();
} else {
    header("location: ../login.php");
    exit();
}

?>