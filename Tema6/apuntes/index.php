<?
    //require_once('Persona.php');
    require_once('Persona2.php');

    $p1= new Persona('manuel',26,'manuhg13@gmail.com');
    /*var_dump($p1); 
    echo '<br><br>';
    echo $p1->getNombre();
    
    echo '<br><br>';
    echo $p1;
    $p2= clone $p1;
    echo '<br><br>';
    echo $p2;
    //Para diferenciar mismos valores a mismo objeto 
    if ($p1==$p2) {
        echo "Tienen los mismos valores";
    }
    if ($p1===$p2) {
        echo "Es el mismo";
    }
    echo '<br><br>';*/
    echo '<br><br>';
    echo $p1->__get('edad');
    $p1->edad=20;
    echo '<br><br>';
    echo $p1->__get('edad');
    echo '<br><br>';
    echo Persona::$id
    ?>