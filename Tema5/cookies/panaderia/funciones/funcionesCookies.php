<?

    
    function productoVisto($id){
        if(!isset($_COOKIE['visto'])){
            setcookie('visto[0]',$id);
        }else{
            //Si existe en el array
            $array=$_COOKIE['visto'];
            if (in_array($id,$array)) {
                $indice=array_search($id,$array);
                unset($array[$indice]);
                array_push($array,$id);
            }else{
                if (count($array)==3) {
                    unset($array[0]);
                }
                array_push($array,$id);
            }
            actualizar($array);
        }
        
    }

    function actualizar($array){
        $i=0;
        foreach ($array as $id) {
            setcookie('visto['.$i++.']',$id);
        }
    }


    function mostrarUltimos(){
        if (isset($_COOKIE)){
            $array = $_COOKIE['visto'];
            $array=array_reverse($array);
            foreach ($array as $id) {
                $producto=findById($id);
                $producto=$producto[0];
                echo '<article  class="card">';
                echo '<a href="verProducto.php?cod='.$producto['codigo'].'"><img src="webroot/'.$producto['baja'].'" alt="pan"></a>';
                echo '<p>'.$producto['nombre'].'</p>';
                echo '</article>';
                
            }
        }

    }
?>