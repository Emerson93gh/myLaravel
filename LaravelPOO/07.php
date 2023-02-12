<?php
include 'includes/header.php';

// Metodos, son funciones que agregadas a una clase se le conocen como metodos
class Empleado {
    // atributos o variables
    public $nombre;
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

        //$this->mostrarEmpleado(); // otra forma de llamar al metodo, se ejecuta por cada instancia
    }
    // metodo
    public function mostrarEmpleado() 
    {
        //echo 'Mostrando nombre de empleado';
        echo $this->nombre . " " . $this->apellido;
    }
    public function retornarDepartamento()
    {
        return $this->departamento;
    }
}
// instancias
$empleado = new Empleado('Emerson', 'Solano', 'TI', 'esolano@mail.com', 026);
//$empleado->mostrarEmpleado(); // una forma de llamar al metodo

$empleado2 = new Empleado('Raquel', 'Luz', 'COM', 'rluz@mail.com', 027);

echo "<pre>"; // dar mejor formato
var_dump($empleado);
echo "</pre><br/>";
echo "<pre>"; // dar mejor formato
var_dump($empleado2);
echo "</pre>";

$empleado->mostrarEmpleado();
echo "<br/>";
$departamento1 = $empleado->retornarDepartamento();
echo $departamento1;