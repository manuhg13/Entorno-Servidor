<?php
// arrays numericos 
$meses = array();
echo var_dump($meses);

$meses = array("Enero", "Febrero", "Marzo");
echo "<pre>";
echo var_dump($meses);
echo "</pre>";

//Con longitud
$diasSemana = array(7);
echo "<pre>";
echo var_dump($diasSemana);
echo "</pre>";

//Acceder o modificar 
echo $meses[2];
echo "<br><br>";

foreach ($meses as $i) {
    echo $i;
    echo "&nbsp;";
}

echo "<br><br>";
$meses[3]="Abril";
foreach ($meses as $i) {
    echo $i;
    echo "&nbsp;";
}
echo "<br><br>";
$meses[5]="Junio";
$meses[6]="Julio";
foreach ($meses as $i) {
    echo $i;
    echo "&nbsp;";
}

var_dump($meses);

array_push($meses, "Agosto");
var_dump($meses);


//quitar un elemento
unset($meses[0]);
var_dump($meses);

//arrays multidimensionales
echo "<br><br>";
$multi= array(
    'DAM' => array("PROG"=>"Programación","LM"=>"Lenguaje de Marcas"),
    'DAW2'=> array("DWES"=>"Servidor","DWEC"=>"Cliente")
);

foreach ($multi as $curso => $valor) {
    echo "<br>El curso " . $curso . " y estas asignaturas";
    foreach ($valor as $abreviatura => $asignatura) {
        echo "&nbsp;" . $abreviatura . "=> " . $asignatura; 
    }
}
echo "<br><br>";
//Curreb da el ultimo indice accedido del array 
echo current($meses);



while($elemento = each($meses)){
    print_r($elemento);
}
?>