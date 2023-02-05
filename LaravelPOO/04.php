<?php
include 'includes/header.php';

// Constructores
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
    }
}
// instancias
$empleado = new Empleado('Emerson', 'Solano', 'TI', 'esolano@mail.com', 026);
$empleado2 = new Empleado('Raquel', 'Luz', 'COM', 'rluz@mail.com', 027);

echo "<pre>"; // dar mejor formato
var_dump($empleado);
echo "</pre><br/>";
echo "<pre>"; // dar mejor formato
var_dump($empleado2);
echo "</pre>";