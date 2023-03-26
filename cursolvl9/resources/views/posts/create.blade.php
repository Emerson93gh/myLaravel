<x-layouts.app
title="Crear nuevo post"
meta-description="Formulario para crear un nuevo post en el blog">

<h1>Create new post</h1>

<form action=" {{ route('posts.store') }} " method="POST">
    @csrf
    <label>
        Title <br/>
        <input type="text" name="title">
    </label><br/>
    <label>
        Body <br/>
        <textarea name="body" id="" cols="30" rows="10"></textarea>
    </label><br/>
    <button type="submit">Enviar</button>
</form><br/>

<a href="{{ route('posts.index') }}">Regresar</a>

</x-layouts.app>
