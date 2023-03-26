<label>
    Title <br/> {{-- Normalizando formularios edit y create --}}
    <input type="text" name="title" value="{{ old('title', $post->title) }}" >
    <br />
    @error('title')
        <small style="color: red"> {{ $message }} </small>
    @enderror
</label><br/>
<label>
    Body <br/> {{-- Normalizando formularios edit y create --}}
    <textarea name="body" id="" cols="30" rows="5">{{ old('body', $post->body) }}</textarea>
    <br />
    @error('body')
        <small style="color: red"> {{ $message }} </small>
    @enderror
</label><br/>
