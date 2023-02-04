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
//----------------------------------------------
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
//---------------------------------------------------------

function validarRegistro(){
    if (!isset($_REQUEST['guardar'])){
        $_SESSION['registroError']['enviado']='No enviado';
    }

    if (vacio('user') || UsuarioDAO::findById($_REQUEST['user'])!=null){
        $_SESSION['registroError']['user']='Fallo en el campo usuario';
    }

    if (vacio('pass') || vacio('pass2') || !patPass() || $_REQUEST['pass']!=$_REQUEST['pass2']){
        $_SESSION['registroError']['pass']='Fallo en el campo contraseña';
    }

    if (vacio('email') || !patMail()) {
        $_SESSION['registroError']['email']='Fallo en el campo email';
    }

    if (vacio('fecha') || !patFecha()) {
        $_SESSION['registroError']['fecha']='Fallo en el campo fecha';
    }

    if (vacio('nombre')) {
        $_SESSION['registroError']['nombre']='Fallo en el campo nombre';
    }

    if (!isset($_REQUEST['roles']) || $_REQUEST['roles']==0){
        $_SESSION['registroError']['roles']='Fallo en el campo roles';
    }

    if (!isset($_SESSION['registroError'])){
        return true;
    }else{
        return false;
    }
}

function validarProducto(){
    if (!isset($_REQUEST['guardar'])){
        $_SESSION['prodError']['guardar']='No enviado';
    }
    if (vacio('nombre')){
        $_SESSION['prodError']['nombre']='Nombre de producto vacio';
    }
    if (vacio('precio')){
        $_SESSION['prodError']['precio']='Precio de producto vacio';
    }
    if (vacio('descripcion')){
        $_SESSION['prodError']['descripcion']='Descripcion de producto vacio';
    }
    if (vacio('stock')){
        $_SESSION['prodError']['stock']='Stock de producto vacio';
    }

    if (!file_exists($_FILES['url']['tmp_name'])){
        $_SESSION['prodError']['url']='No existe esta imagen';
    }elseif ($_FILES['url']['size']==0) {
        $_SESSION['prodError']['url']='Fichero vacio';
    }elseif (!patFoto()) {
        $_SESSION['prodError']['url']='Extensión de archivo no soportada';
    }

    if (!isset($_SESSION['prodError'])){
        $ubi= "./web/img/" . $_FILES['url']['name'];
        move_uploaded_file($_FILES['url']['tmp_name'],$ubi);
        return true;
    }else{
        return false;
    }
}

function validarUsuario(){
    if (!isset($_REQUEST['guardar'])){
        $_SESSION['userError']['guardar']='No enviado';
    }

    if (vacio('nombre')){
        $_SESSION['userError']['nombre']='Nombre vacio';
    }
    
    if (vacio('pass') || vacio('pass2')){
        $_SESSION['userError']['pass']='Contraseña vacía';
    }elseif ($_REQUEST['pass']!=$_REQUEST['pass2']) {
        $_SESSION['userError']['pass']='No son iguales';    
    }elseif (!patPass()) {
        $_SESSION['userError']['pass']='Debes incluir, mayuscula, minuscula, número y al menos 8 caracteres';        
    }
    
    if (vacio('email')){
        $_SESSION['userError']['email']='Debes rellenar el correo';        
    }/*elseif (!patMail()) {
        $_SESSION['userError']['email']='Email incorrecto';             
    }*/
    
    if ($_REQUEST['roles']==0) {
        $_SESSION['userError']['roles']='Selecciona un rol';                
    }

    if (!isset($_SESSION['userError'])){
        return true;
    }else{
        return false;
    }
}

function validarAlbaran(){
    if (!isset($_REQUEST['guardar'])){
        $_SESSION['albError']['guardar']='No enviado';
    }

    if (vacio('fecha')) {
        $_SESSION['albError']['fecha']='Campo fecha vacío';
    }elseif (!patFecha())  {
        $_SESSION['albError']['fecha']='Fecha en formato incorrecto (aaaa-mm-dd)';
    }
    
    if (vacio('cantidad')){
        $_SESSION['albError']['cantidad']='Cantidad no puede estar vacío';
    }
    
    if (!isset($_SESSION['albError'])){
        return true;
    }else{
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