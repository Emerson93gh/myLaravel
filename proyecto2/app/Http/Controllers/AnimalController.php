<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAnimalRequest;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['only' => ['create', 'edit', 'store']]);
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::get();
        return view('animals.index')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.form', ['animal' => new Animal]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'text',
            'edad' => 'required',
            'descripcion' => 'required',
        ]);

        //$animal = Animal::create($request->only('nombre','edad','descripcion'));

        $animal = new Animal();
        $animal->nombre = $request->input('nombre');
        $animal->edad = $request->input('edad');
        $animal->descripcion = $request->input('descripcion');
        $animal->save();


        //Animal::create($request->validate());

        return to_route('animals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', ['animal' => $animal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nombre' => 'required', 'text',
            'edad' => 'required',
            'descripcion' => 'required',
        ]);

        $animal->nombre = $request['nombre'];
        $animal->edad = $request['edad'];
        $animal->descripcion = $request['descripcion'];
        $animal->save();

        return to_route('animals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return to_route('animals.index');
    }
}
