<?php
include 'includes/header.php';

// Constructor property promotion, comparar con 04.php
class Empleado {
    public function __construct(
        public $nombre,
        public $apellido,
        public $departamento,
        public $email,
        public $codigo,
    ){}
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