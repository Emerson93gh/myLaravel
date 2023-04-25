<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function empleado() {
        $empleados = Empleado::select('id', 'nombre', 'correo')->get();

        //return $empleados;
        return datatables()->collection($empleados)->toJson();
    }
}
