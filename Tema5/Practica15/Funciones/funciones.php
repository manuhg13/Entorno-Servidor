<?

    function anadirBBDD(){
        return file_get_contents('./BBDD/tienda.sql');
    }

    /*-----------Sesiones y perfiles---------*/
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
            if ($_SESSION['perfil']=='MOD02'){
                return true;
            }
            return false;
        }
    }
    function esNormal(){
        if(isset($_SESSION['perfil'])){
            if ($_SESSION['perfil']=='NOR03'){
                return true;
            }
            return false;
        }
    }

    /*--------------Registro-------------------*/ 
    
    function vacio($dato){
        if (empty($_REQUEST[$dato])) {
            return true;
        }else {
            return false;
        }
    }

    function enviado(){
        if (isset($_REQUEST['enviar']))
            return true;
        return false;
    }
    function existe($nombre){
        if (isset($_REQUEST[$nombre]))
            return true;
        return false;
    }

    function usuarioValido(){
        if(validaSoloUser($_REQUEST['user'])){
            return true;
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
        $patron='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){8,}/';
        if (preg_match($patron,$_REQUEST['pass'])) {
            return true;
        }
        return false;
    }

    function validarTodo(){
        if(enviado()){
            if(!vacio('user') && usuarioValido()){
                if(!vacio('pass') && !vacio('pass2') && patPass() && $_REQUEST['pass']==$_REQUEST['pass2']){
                    if (!vacio('mail') && patMail()) {
                        if (!vacio('fecha') && patFecha()) {
                            return true;
                        }
                    }
                }
            }
        }
    }


?>