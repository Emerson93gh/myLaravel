<?php
include 'includes/header.php';

// instanciar una clase
class Empleado {

}
// multiples instancias
$empleado = new Empleado;
$empleado2 = new Empleado;
$empleado3 = new Empleado;

echo "<pre>"; // dar mejor formato
var_dump($empleado);
echo "</pre>";
echo "<pre>"; // dar mejor formato
var_dump($empleado2);
echo "</pre>";
echo "<pre>"; // dar mejor formato
var_dump($empleado3);
echo "</pre>";