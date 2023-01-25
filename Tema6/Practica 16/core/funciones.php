<?

function estaValidado(){
    if (isset($_SESSION['validado'])){
        return true;
    }

    return false;
}
function esAdmin(){
    if(isset($_SESSION['roles'])){
        if ($_SESSION['roles']=='ADM01'){
            return true;
        }
        return false;
    }
}
function esModerador(){
    if(isset($_SESSION['roles'])){
        if ($_SESSION['roles']=='P0002'){
            return true;
        }
        return false;
    }
}

?>