<?php
include 'includes/header.php';

// Getters and Setters
class Empleado {
    /* public, el acceso es en cualquier lugar (clase u objeto) 
    private, es mas utilizado en herencia
    protected, el acceso es en la clase
      */
    protected $nombre;
    protected $apellido;
    protected $departamento;
    protected $email;
    protected $codigo;

    public function __construct($nombre, $apellido, $departamento, $email, $codigo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->departamento = $departamento;
        $this->email = $email;
        $this->codigo = $codigo;
    }

    /* 
        Get para obtener un valor
        Set para modificar un valor
    */
    public function getNombre() 
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getDepartamento()
    {
        return $this->departamento;
    }
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
// instancias
$empleado = new Empleado('Emerson', 'Solano', 'TI', 'esolano@mail.com', 026);


echo "<pre>"; // dar mejor formato
var_dump($empleado);
echo "</pre><br/>";

echo $empleado->getNombre();

$empleado->setNombre("Nuevo nombre");
echo "<br/>";
echo $empleado->getNombre();
echo "<br/>";
echo $empleado->getCodigo();
echo "<br/>";
echo $empleado->getDepartamento();
echo "<br/>";
echo $empleado->getEmail();