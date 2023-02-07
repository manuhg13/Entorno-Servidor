<?
    $con=curl_init();
    $url='http://dataservice.accuweather.com/locations/v1/cities/search?apikey=UZ4rUUIANoxWmt6vrkzMI6WoEeojSKGj&q='.$_REQUEST['ciudad'].'%20ES';
    curl_setopt($con, CURLOPT_URL, $url);
    curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
    $resultado=curl_exec($con);
    $datos=json_decode($resultado,true);
    ?>
<pre>
    <?
        print_r($datos);
    ?>
</pre>

<button>Volver<a href="./tiempo.php"></a></button>