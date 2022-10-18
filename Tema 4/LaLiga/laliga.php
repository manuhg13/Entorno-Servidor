<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaLiga</title>
</head>
<body>
    <?php
        $liga =
        array(
            "Zamora" =>  array(
                "Salamanca" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
                )
            ),
            "Salamanca" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
                )
            ),
            "Avila" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
                ),
                "Salamanca" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
                )
            ),
            "Valladolid" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Salamanca" => array(
                    "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
                )
            ),
        );

        echo "<table border='1'><tr><th>Equipos</th>";
        $equiposLocales=array();       
        $equiposVisitantes=array();        

        foreach ($liga as $locales => $equipo) {
            echo "<th>" . $locales . "</th>"; 
            array_push($equiposLocales, $locales);
        }

        echo "</tr>";

        foreach ($liga as $locales => $visitantes) {
            $i=0;
            echo "<tr><td>" . $locales . "</td>";
            foreach ($visitantes as $equipo => $dato) {
                if ($locales==$equiposLocales[$i++]) {
                    echo "<td>&nbsp;</td>";
                } 
                echo "<td>";
                foreach ($dato as $clave => $valor) {
                    echo "<p>" . $valor . "</p>"; 
                        
                }
                echo "</td>";
            }
            echo "</tr>";
        } 

        echo "</table><br><br>";

        $clasificacion=array(
            "Zamora" => array(
                "Puntos"=>0, "GolesFavor"=>0, "GolesContra"=>0
            ),
            "Salamanca" => array(
                "Puntos"=>0, "GolesFavor"=>0, "GolesContra"=>0
            ),
            "Avila" => array(
                "Puntos"=>0, "GolesFavor"=>0, "GolesContra"=>0
            ),
            "Valladolid" => array(
                "Puntos"=>0, "GolesFavor"=>0, "GolesContra"=>0
            ),

        );

        echo "<table border=1><tr>";
        echo "<th>Equipos</th>";
        echo "<th>Puntos</th>";
        echo "<th>Goles a favor</th>";
        echo "<th>Goles en contra</th></tr>";

        foreach ($liga as $locales => $partidos) {
            $puntos=0;
            $golesFavor=0;
            $golesContra=0;
            echo "<tr><td>" . $locales . "</td>";
            foreach ($partidos as $visitante => $resultado) {
                foreach ($resultado as $clave => $valor) {
                    $partidoJugado=explode("-", $valor);
                    $golesFavor+=$partidoJugado[0];
                    $golesContra+=$partidoJugado[1];
                    if ($partidoJugado[0]>$partidoJugado[1]){
                        $puntos+=3;
                    }elseif ($partidoJugado) {
                        # code...
                    }
                }
            }
            echo "</tr>";
        }
        
    ?>
</body>
</html>
