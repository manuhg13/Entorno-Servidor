<?
    $con=curl_init();
    $url='http://dataservice.accuweather.com/locations/v1/cities/search?apikey=UZ4rUUIANoxWmt6vrkzMI6WoEeojSKGj&q='.$_REQUEST['ciudad'].'%20Castile%20and%20Leon&language=es';
    curl_setopt($con, CURLOPT_URL, $url);
    curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
    $resultado=curl_exec($con);
    $datos=json_decode($resultado,true);

    $url2='http://dataservice.accuweather.com/forecasts/v1/daily/5day/'.$datos[0]['Key'].'?apikey=UZ4rUUIANoxWmt6vrkzMI6WoEeojSKGj&language=es';
    curl_setopt($con, CURLOPT_URL, $url2);
    curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
    $resultado=curl_exec($con);
    $tiempo=json_decode($resultado,true);

    curl_close($con);
?>
<!doctype html>
<html lang="es">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  
  <main>
    <div class="table-responsive">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Tiempo en <? echo $_REQUEST['ciudad']?></caption>
                <tr>
                    <th></th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr class="table-primary" >
                        <th scope="row">Máxima</td>
                        <?foreach($tiempo['DailyForecasts'] as $dia){?>                   
                            <? foreach($dia['Temperature']['Maximum'] as $sol){?>
                                <td><? echo $sol['Value'] ?></td>
                            <?}?>
                        <?}?>
                    </tr>
                    <tr class="table-primary" >
                        <th scope="row">Precipitacion dia</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Mínimo</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Precipitacion noche</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </tbody>
                <tfoot>
                    
                </tfoot>
        </table>
    </div>
    

      <a href="./tiempo.php"><button>Volver</button></a>
  </main>

  <pre>
    <?print_r($tiempo);?>
  </pre>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>

