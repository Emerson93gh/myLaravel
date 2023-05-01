<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Validator;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Autor::select('id', 'nombre_autor', 'fecha_nacimiento')->get();

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($data) {
                    $button = '<button type="button" name="edit" id="'.$data->id.'"
                        class="btn btn-warning btn-sm edit"><i class="bi bi-pencil-square"></i>
                            Editar
                        </button>';
                    $button .= '  <button type="button" name="delete" id="'.$data->id.'"
                        class="btn btn-danger btn-sm delete"><i class="bi bi-trash"></i>
                            Eliminar
                        </button>';
                    return $button;
                })
                ->make(true);
        }
        return view('autores.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = array(
            'nombre_autor' => 'required',
            'fecha_nacimiento' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nombre_autor' => $request->nombre_autor,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        );

        Autor::create($form_data);

        return response()->json(['success' => 'Autor agregado satisfactoriamente!']);
    }

    public function show(Autor $autor)
    {
        //
    }

    public function edit($id)
    {
        if(request()->ajax()) {
            $data = Autor::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request, Autor $autor)
    {
        $rules = array(
            'nombre_autor' => 'required',
            'fecha_nacimiento' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nombre_autor' => $request->nombre_autor,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        );

        Autor::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Autor actualizado satisfactoriamente!']);
    }

    public function destroy($id)
    {
        $data = Autor::findOrFail($id);
        $data->delete();
    }
}
