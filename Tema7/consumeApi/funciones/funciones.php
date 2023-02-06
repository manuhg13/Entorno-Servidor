<?
    require_once '../peticiones/curl.php';

    function cargarConciertos(){
        $lista= get();
        foreach($lista as $value){
            echo "<option value='".$value['id']."'>".$value['grupo'].$value['id']."</option>";
        }
    }