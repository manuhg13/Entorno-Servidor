<?
     function estaValidado(){
        if (isset($_SESSION['validado'])){
            return true;
        }

        return false;
    }
    function esAdmin(){
        if(isset($_SESSION['perfil'])){
            if ($_SESSION['perfil']=='ADM01'){
                return true;
            }
            return false;
        }
    }
    function esModerador(){
        if(isset($_SESSION['perfil'])){
            if ($_SESSION['perfil']=='P0002'){
                return true;
            }
            return false;
        }
    }

    /*function validarTodo(){
        if(enviado()){
            if(!vacio('user') && usuarioValido()){
                if(!vacio('pass') && !vacio('pass2') && patPass() && $_REQUEST['pass']==$_REQUEST['pass2']){
                    if (!vacio('mail') && patMail()) {
                        if (!vacio('fecha') && patFecha()) {
                            if (!vacio('nombre')) {
                                if (existe('roles') && $_REQUEST['roles']!=0) {
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    function patMail(){
        $patron='/^.{1,}@.{1,}\..{2,}$/';
        if (preg_match($patron,$_REQUEST['mail'])==1){
            return true;
        }
        return false;
    }

    function patPass(){
        $patron='/(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,}$/';
        if (preg_match($patron,$_REQUEST['pass'])) {
            return true;
        }
        return false;
    }*/
    
?>