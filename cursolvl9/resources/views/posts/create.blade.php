<x-layouts.app
title="Crear nuevo post"
meta-description="Formulario para crear un nuevo post en el blog">

<h1>Create new post</h1>

{{-- @dump($errors->all()) --}}
<form action=" {{ route('posts.store') }} " method="POST">
    @csrf
    <label>
        Title <br/>
        <input type="text" name="title" value="{{ old('title') }}" >
        <br />
        @error('title')
            <small style="color: red"> {{ $message }} </small>
        @enderror
    </label><br/>
    <label>
        Body <br/>
        <textarea name="body" id="" cols="30" rows="5">{{ old('body') }}</textarea>
        <br />
        @error('body')
            <small style="color: red"> {{ $message }} </small>
        @enderror
    </label><br/>
    <button type="submit">Enviar</button>
</form><br/>

<a href="{{ route('posts.index') }}">Regresar</a>

</x-layouts.app>
