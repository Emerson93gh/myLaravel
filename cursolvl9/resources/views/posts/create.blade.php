<x-layouts.app
title="Crear nuevo post"
meta-description="Formulario para crear un nuevo post en el blog">

<h1>Create new post</h1>
{{-- @dump($post->toArray()) --}}
{{-- @dump($errors->all()) --}}
<form action=" {{ route('posts.store') }} " method="POST">
    @csrf
    @include('posts.form-fields')
    <button type="submit">Enviar</button>
</form><br/>

<a href="{{ route('posts.index') }}">Regresar</a>

</x-layouts.app>
