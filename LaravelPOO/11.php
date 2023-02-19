<?php
include 'includes/header.php';

// Clases Abstractas, como objetivo es que la clase sea de plantilla para ser heredada o utilizada por otras clases. No puede ser instanciada.
abstract class Persona {
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $telefono;

    public function __construct($nombre,$apellido,$email,$telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function monstrarInformacion() 
    {
        echo "Nombre: " . $this->nombre . " " . $this->apellido . " Email: " . $this->email; 
    }

    public function getTelefono() 
    {
        return $this->telefono;
    }
}
class Empleado extends Persona {
    protected $codigo;
    protected $departamento;

    public function __construct($nombre,$apellido,$email,$telefono,$codigo,$departamento)
    {
        parent::__construct($nombre,$apellido,$email,$telefono);
        $this->codigo = $codigo;
        $this->departamento = $departamento;
    }
}

class Proveedor extends Persona {
    protected $empresa;

    public function __construct($nombre,$apellido,$email,$telefono,$empresa)
    {
        parent::__construct($nombre,$apellido,$email,$telefono);
        $this->empresa = $empresa;
    }
    // reescribiendo un metodo
    public function monstrarInformacion() 
    {
        echo "Nombre: " . $this->nombre . " " . $this->apellido . " Email: " . $this->email . " de la empresa: " . $this->empresa; 
    }
}

//$persona = new Persona('Persona','de Apellido','persona@persona.com',85454549);
$empleado = new Empleado('Emerson','Solano','e_solano@mail.com',74174100,202,'TI');
$proveedor = new Proveedor('Milan','De los Angeles','mangeles@empresa.com',20202020,'UP TI');

// echo "<pre>";
// var_dump($persona);
// echo "</pre><br/>";

echo "<pre>";
var_dump($empleado);
echo "</pre><br/>";

echo "<pre>";
var_dump($proveedor);
echo "</pre><br/>";

$empleado->monstrarInformacion();
echo "<br/>";
$proveedor->monstrarInformacion();
echo "<br/>";
echo $proveedor->getTelefono();