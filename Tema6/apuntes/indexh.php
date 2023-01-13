<?
    require('./Alumno.php');
    require('./Abstracta.php');
    require('./AbsH1.php');
    require('./AbsH2.php');


    $al= new Alumno('Manuel',26,'manu@tuvieja.com','DAW2');

    echo $al->__toString();

    echo '<br><br>';

    $al->darBaja();

    echo $al;

    $nueva= new AbsH2();
?>