<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;

class PrestamoController extends Controller
{
    public function index()
    {
        // $id = $request->id;
        //$prestamos = Prestamo::all();
        // $prestamos = Prestamo::table('prestamos')->where('libro_id', $id)->get();
        // return view('prestamos.index', ['prestamos' => $prestamos]);

        if(request()->ajax()) {
            $prestamos = Prestamo::with('libro')->select('prestamos.*');

            return DataTables::of($prestamos)->addIndexColumn()
                ->addColumn('action', function($prestamos) {
                    $button = '<button type="button" name="edit" id="'.$prestamos->id.'"
                        class="btn btn-warning btn-sm edit"><i class="bi bi-pencil-square"></i>
                            Editar
                        </button>';
                    $button .= '  <button type="button" name="delete" id="'.$prestamos->id.'"
                        class="btn btn-danger btn-sm delete"><i class="bi bi-trash"></i>
                            Eliminar
                        </button>';
                    return $button;
                })
                ->make(true);
        }

        $libros = Libro::all();

        return view('prestamos.index', ['libros' => $libros]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = array(
            'nombre_persona' => 'required',
            'libro_id' => 'required',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nombre_persona' => $request->nombre_persona,
            'libro_id' => $request->libro_id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
        );

        Prestamo::create($form_data);

        return response()->json(['success' => 'Préstamo agregado satisfactoriamente!']);
    }

    public function show(Prestamo $prestamo)
    {
        //
    }

    public function edit(Prestamo $prestamo, $id)
    {
        //
        if(request()->ajax()) {
            $data = Prestamo::findOrFail($id);

            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $rules = array(
            'nombre_persona' => 'required',
            'libro_id' => 'required',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nombre_persona' => $request->nombre_persona,
            'libro_id' => $request->libro_id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
        );

        Prestamo::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Préstamo actualizado satisfactoriamente!']);
    }

    public function destroy($id)
    {
        $data = Prestamo::findOrFail($id);
        $data->delete();
    }
}
