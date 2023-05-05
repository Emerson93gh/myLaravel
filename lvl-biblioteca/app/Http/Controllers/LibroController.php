<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;
//use DataTables;
use Validator;
use Yajra\DataTables\DataTables;

class LibroController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            // $data = Libro::select('id', 'titulo', 'autor_id', 'ubicacion',
            //     'cantidad_ejemplares', 'cantidad_disponibles')->get();
            // $nombreAutor = Autor::table('autors')->select('nombre_autor')->where('id', $data->autor_id);

           $libros = Libro::with('autor')->select('libros.*');

            return DataTables::of($libros)->addIndexColumn()
                ->addColumn('action', function($libros) {
                    $button = '<button type="button" name="prestamo" id="'.$libros->id.'"
                        class="btn btn-info btn-sm prestamo"><i class="bi bi-pencil-square"></i>
                            Préstamo
                        </button>';
                    $button .= '  <button type="button" name="edit" id="'.$libros->id.'"
                        class="btn btn-warning btn-sm edit"><i class="bi bi-pencil-square"></i>
                            Editar
                        </button>';
                    $button .= '  <button type="button" name="delete" id="'.$libros->id.'"
                        class="btn btn-danger btn-sm delete"><i class="bi bi-trash"></i>
                            Eliminar
                        </button>';
                    return $button;
                })
                ->make(true);
        }

        $autores = Autor::all();

        return view('libros.index', ['autores' => $autores]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = array(
            'titulo' => 'required',
            'autor_id' => 'required',
            'ubicacion' => 'required',
            'cantidad_ejemplares' => 'required|gte:1',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'titulo' => $request->titulo,
            'autor_id' => $request->autor_id,
            'ubicacion' => $request->ubicacion,
            'cantidad_ejemplares' => $request->cantidad_ejemplares,
        );

        Libro::create($form_data);

        return response()->json(['success' => 'Libro agregado satisfactoriamente!']);
    }

    public function show($id)
    {
        //$id = $libro->id;

        if(request()->ajax()) {
            $data = Libro::findOrFail($id);

            return response()->json(['result' => $data]);
        }
    }

    public function edit($id)
    {
        if(request()->ajax()) {
            $data = Libro::findOrFail($id);
            // $autores = Autor::all(); //, 'autores' => $autores
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request, Libro $libro)
    {
        $rules = array(
            'titulo' => 'required',
            'autor_id' => 'required',
            'ubicacion' => 'required',
            'cantidad_ejemplares' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'titulo' => $request->titulo,
            'autor_id' => $request->autor_id,
            'ubicacion' => $request->ubicacion,
            'cantidad_ejemplares' => $request->cantidad_ejemplares,
        );

        Libro::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Libro actualizado satisfactoriamente!']);
    }

    public function destroy($id)
    {
        $data = Libro::findOrFail($id);
        $data->delete();
    }
}
