@extends('theme.base-bs5')
@section('content')
    <div>
        <div class="row justify-content-center text-center">
            <div class="col col-lg-6">
                <h1 class="text-primary font-bold text-center my-5">Lista de animales</h1>
            </div>
            <div class="col col-lg-6">
                <a href="{{ route('animals.form') }}" class="btn btn-primary my-5">Crear</a>
            </div>
        </div>
        <table class="table table-striped table-secondary text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($animals as $animal)
                <tr>
                    <th scope="row"> {{$animal->id}} </th>
                    <td>{{$animal->nombre}}</td>
                    <td>{{$animal->edad}}</td>
                    <td>{{$animal->descripcion}}</td>
                    <td>
                        <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('animals.destroy', $animal) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Esta seguro/a de eliminar el registro?')">Eliminar</button>
                                </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"><span class="fw-bold">NO HAY REGISTROS!</span> </td>
                </tr>
                @endforelse ()
            </tbody>
        </table>
    </div>
@endsection
