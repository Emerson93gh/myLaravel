@extends('theme.base-bs5')
@section('content')
    <h1 class="fw-bold py-2">Actualizar un registro de animal</h1>
    <form action="{{ route('animals.update', $animal) }}" method="POST">
        @csrf @method('PATCH')
        <div class="mb-3">
            <div>
                <label for="nombre" class="form-label">Nombre de animal</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $animal->nombre) }}">
                @error('nombre')
                    <p class="form-text text-danger"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="edad" class="form-label">Edad del animal</label>
                <input type="number" class="form-control" id="edad" name="edad" value="{{ old('edad', $animal->edad) }}">
                @error('edad')
                    <p class="form-text text-danger"> {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" class="form-control" id="descripcion" cols="15" rows="3">{{ old('descripcion', $animal->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="form-text text-danger"> {{ $message }} </p>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
