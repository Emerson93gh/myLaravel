<x-layouts.app
:title="$post->title"
:meta-description="$post->body">

<h1>Edit form</h1>

<form action=" {{ route('posts.update', $post) }} " method="POST">
    @csrf @method('PATCH')
    <label>
        Title <br/>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" >
        <br />
        @error('title')
            <small style="color: red"> {{ $message }} </small>
        @enderror
    </label><br/>
    <label>
        Body <br/>
        <textarea name="body" id="" cols="30" rows="5">{{ old('body', $post->body) }}</textarea>
        <br />
        @error('body')
            <small style="color: red"> {{ $message }} </small>
        @enderror
    </label><br/>
    <button type="submit">Enviar</button>
</form><br/>

<a href="{{ route('posts.index') }}">Regresar</a>

</x-layouts.app>
