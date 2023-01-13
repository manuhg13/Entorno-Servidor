<?
require_once('./Persona2.php');
require_once('./Acciones.php');

class Alumno extends Persona implements Acciones{
    private $curso;

    public function __construct($nombre,$edad,$email,$curso)
    {
        parent::__construct($nombre,$edad,$email);
        parent::$id;
        $this->curso=$curso;
    }

    public function __toString()
    {
        return parent::$id.". Nombre: " .$this->nombre. ", edad: " .$this->curso;
    }

    public function darBaja()
    {
        $this->curso= null;
    }
}

?>