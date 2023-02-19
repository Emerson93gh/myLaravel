<?php
include 'includes/header.php';

// Metodos estaticos, son los que no requieren una instancia para acceder a ellos.
class Empleado {
    /* public, el acceso es en cualquier lugar (clase u objeto) 
    private, es mas utilizado en herencia
    protected, el acceso es en la clase
      */
    protected static $nombre; // variable statica
    public $apellido;
    public $departamento;
    public $email;
    public $codigo;

    public function __construct($nombre, $apellido, $departamento, $email, $codigo)
    {
        self::$nombre = $nombre; /* asi debe tratarse una variable estatica, 
        sino mostrara un error y creara una nueva en lugar de usar la definida como estatica 
        ademas no se mostrara como valor en la instancia y debe obtenerse por un metodo estatico*/
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
    // metodo estatico (el orden puede ser: static public o public static)
    public static function obtenerEmpleado()
    {
        echo "Desde metodo estatico";
    }
    // obtener el valor de una variable estatica
    public static function getNombre()
    {
        return self::$nombre;
    }
}
// llamando un metodo estatico por medio de la clase
Empleado::obtenerEmpleado();

// con una variable estatica
$empleado = new Empleado('Emerson', 'Solano', 'TI', 'esolano@mail.com', 026);
echo "<pre>"; // dar mejor formato
var_dump($empleado);
echo "</pre><br/>";

echo Empleado::getNombre();