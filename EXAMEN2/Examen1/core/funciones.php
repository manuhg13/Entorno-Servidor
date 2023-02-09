<?
    function estaValidado(){
        if (isset($_SESSION['validado'])){
            return true;
        }
        return false;
    }
    
    function vacio($dato){
        if (empty($_REQUEST[$dato])) {
            return true;
        }else {
            return false;
        }
    }
    function sorteado(){
        if(SorteoDAO::findByDate(date('Y-m-d'))){
            return true;
        }else{
            return false;
        }
    }
    
    //----------------------------------------------
    function esAdmin(){
        if(isset($_SESSION['perfil'])){
            if ($_SESSION['perfil']=='admin'){
                return true;
            }
            return false;
        }
    }
    function esNormal(){
        if(isset($_SESSION['perfil'])){
            if ($_SESSION['perfil']=='user'){
                return true;
            }
            return false;
        }
    }
    //------------REGeX-----------------
function patPass(){
    $patron='/(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,}$/';
    if (preg_match($patron,$_REQUEST['pass'])) {
        return true;
    }
    return false;
}


function patMail(){
    $patron='/^.{1,}@.{1,}\..{2,}$/';
    if (preg_match($patron,$_REQUEST['email'])==1){
        return true;
    }
    return false;
}

function patFecha(){
    $patron='/^\d{4}([\-])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/';
    if(preg_match($patron,$_REQUEST['fecha'])==1){
        $cortado=explode('-',$_REQUEST['fecha']);
        if(checkdate($cortado[1],$cortado[2],$cortado[0])){
            return true;
        }
    }
    return false;
}

function patFoto(){
    $patron='/^[^.]+\.(jpg|png|bmp)$/';
    if (preg_match($patron,$_FILES['url']['name'])){
        return true;
    }
    return false;
}

?>