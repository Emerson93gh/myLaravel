<?php
include 'includes/header.php';
include 'DB.php';

// Comunicar 2 clases
class Empleado {
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

$nombre = $empleado->getNombre();

//echo $nombre;
// instancia a otra clase
$db = new DB($nombre);
var_dump($db);
echo "<br/>";
// usar metodo de otra clase
$db->guardar();