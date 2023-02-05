<?php
include 'includes/header.php';

// instanciar una clase
class Empleado {
    // atributos o variables
    public $nombre;
    public $apellido;
    public $departamento;
    public $email;
    public $codigo;
}
// instancias
$empleado = new Empleado;

$empleado->nombre = "Emerson";
$empleado->apellido = "Solano";
$empleado->departamento = "Sistemas";

echo "<pre>"; // dar mejor formato
var_dump($empleado);
echo "</pre>";

$empleado2 = new Empleado;

$empleado2->nombre = "Raquel";
$empleado2->apellido = "Ramos";
$empleado2->departamento = "Comunicaciones";

echo "<pre>"; // dar mejor formato
var_dump($empleado2);
echo "</pre>";