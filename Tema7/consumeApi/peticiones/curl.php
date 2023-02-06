<?
    function get(){
        $con= curl_init();
        $url= 'http://192.168.2.206/DAWServidor/DWES/Tema7/api/conciertos.php/conciertos';
        curl_setopt($con, CURLOPT_URL, $url);
        //curl_setopt($con, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);

        $resultado=curl_exec($con);

        return json_decode($resultado);
    }

    function post($grupo,$fecha,$precio,$lugar){
        $json='{
            "grupo": "'.$grupo.'" ,
            "fecha": "'.$fecha.'" ,
            "precio": "'.$precio.'" ,
            "lugar": "'.$lugar.'" 
        }';
        $con= curl_init();
        $url= 'http://192.168.2.206/DAWServidor/DWES/Tema7/api/conciertos.php/conciertos';
        curl_setopt($con, CURLOPT_URL, $url);
        curl_setopt($con, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($con,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($con, CURLOPT_POST, 1);
        curl_setopt($con,CURLOPT_POSTFIELDS, $json);
        $resultado=curl_exec($con);
        curl_close($con);
        return $resultado;


    }

    function put($id,$grupo,$fecha,$precio,$lugar){
        $json='{
            "grupo": "'.$grupo.'" ,
            "fecha": "'.$fecha.'" ,
            "precio": "'.$precio.'" ,
            "lugar": "'.$lugar.'" 
        }';
        $con= curl_init();
        $url= 'http://192.168.2.206/DAWServidor/DWES/Tema7/api/conciertos.php/conciertos/'.$id;
        curl_setopt($con, CURLOPT_URL, $url);
        curl_setopt($con, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($con,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($con, CURLOPT_PUT, 1);
        curl_setopt($con,CURLOPT_POSTFIELDS, $json);
        $resultado=curl_exec($con);
        curl_close($con);
        return $resultado;
    }
?>