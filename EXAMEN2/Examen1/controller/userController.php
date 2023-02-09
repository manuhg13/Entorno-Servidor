<?
    if(!sorteado()){
        if (ApuestaDAO::findByIdDate($_SESSION['id'],date('Y-m-d'))){
            $apuesta= ApuestaDAO::findByIdDate($_SESSION['id'],date('Y-m-d'));
            $_SESSION['numeros']=array($apuesta->n1,$apuesta->n2,$apuesta->n3,$apuesta->n4,$apuesta->n5);
        }
        if (isset($_REQUEST['apostar'])){
            if (count($_REQUEST['numeros'])==5){
                unset($_SESSION['errorApuesta']);
                $numeros=$_REQUEST['numeros'];
                $apuesta=new Apuesta(null,null,$_SESSION['id'],$numeros[0],$numeros[1],$numeros[2],$numeros[3],$numeros[4]);
                if (ApuestaDAO::insert($apuesta)){
                    $apuesta= ApuestaDAO::findByIdDate($_SESSION['id'],date('Y-m-d'));
                    $_SESSION['numeros']=$numeros;
                    $_SESSION['vista'] = $vistas['user'];
                    $_SESSION['controlador'] = $controladores['user'];
                    $_SESSION['pagina'] = 'Usuario';
                }
            }else{
                $_SESSION['errorApuesta']=='Debes seleccionar exactamente 5 numeros';
            }
        }elseif (isset($_REQUEST['editar'])){
            if (count($_REQUEST['numeros'])==5){
                unset($_SESSION['errorApuesta']);
                $numeros=$_REQUEST['numeros'];
                $apuesta=new Apuesta(null,null,$_SESSION['id'],$numeros[0],$numeros[1],$numeros[2],$numeros[3],$numeros[4]);
                if (ApuestaDAO::update($apuesta)){
                    $apuesta= ApuestaDAO::findByIdDate($_SESSION['id'],date('Y-m-d'));
                    $_SESSION['numeros']=$numeros;
                    $_SESSION['vista'] = $vistas['user'];
                    $_SESSION['controlador'] = $controladores['user'];
                    $_SESSION['pagina'] = 'Usuario';
                }
            }else{
                $_SESSION['errorApuesta']=='Debes seleccionar exactamente 5 numeros';
            }

        }
    }else{
        if (ApuestaDAO::findByIdDate($_SESSION['id'],date('Y-m-d'))){
            $apuesta= ApuestaDAO::findByIdDate($_SESSION['id'],date('Y-m-d'));
            $_SESSION['numeros']=array();
        }
    }


?>