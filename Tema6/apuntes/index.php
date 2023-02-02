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
    echo Persona::$id;
    echo '<br><br>';
    echo Persona::elProximoID();
    echo '<br><br>';
    echo "Propiedad que existen en la clase: ";
    print_r(get_class_vars('Persona'));
    echo '<br><br>';
    //Las variables privadas no se pueden ver a no ser que se ponga una funcion publica que las enseñe
    echo "Propiedad que existen en el objeto: ";
    print_r(get_object_vars($p1));
    
    echo '<br><br>';
    setcookie('objeto',serialize($p1));
    
    echo var_dump(unserialize($_COOKIE['objeto']));
    
    echo '<br><br>';
    $p2=unserialize($_COOKIE['objeto']);
    print_r(get_object_vars($p2));

    ?>