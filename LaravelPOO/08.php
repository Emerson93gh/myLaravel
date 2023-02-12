<?php
include 'includes/header.php';

// Modificadores de acceso
class Empleado {
    /* public, el acceso es en cualquier lugar (clase u objeto) 
    private, es mas utilizado en herencia
    protected, el acceso es en la clase
      */
    protected $nombre;
    public $apellido;
    public $departamento;
    public $email;
    public $codigo;

    public function __construct($nombre, $apellido, $departamento, $email, $codigo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->departamento = $departamento;
        $this->email = $email;
        $this->codigo = $codigo;
    }

    public function obtenerNombre() 
    {
        return $this->nombre;
    }
    public function cambiarNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
// instancias
$empleado = new Empleado('Emerson', 'Solano', 'TI', 'esolano@mail.com', 026);


echo "<pre>"; // dar mejor formato
var_dump($empleado);
echo "</pre><br/>";

echo $empleado->obtenerNombre();

$empleado->cambiarNombre("Nuevo nombre");
echo "<br/>";
echo $empleado->obtenerNombre();