<?
    function sinBBDD(){
        if (isset($_REQUEST['script'])){
            return true;
        }
        return false;
    }

    function anadirBBDD(){
        $script= file_get_contents('./BBDD/cine.sql');
        return $script;
    }
?>