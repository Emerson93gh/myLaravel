<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // para mostrar todos mis registros de la tabla cliente
        return Cliente::all();
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required'
        ]);

        $cliente = new Cliente;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->save();

        return $cliente;
    }

    public function show(Cliente $cliente)
    {
        //$cliente = Cliente::find($id);
        return $cliente;
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required'
        ]);

        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->update();

        return $cliente;
    }

    //public function destroy(Cliente $cliente)
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente)){
            return response()->json('No se pudo completar la operacion',404);
        }
        $cliente->delete();
        //return [];
        return response()->noContent();
    }
}
