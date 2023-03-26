<x-layouts.app
title="Blog"
meta-description="Blog meta description">

    <h1>Blog</h1>

    <a href=" {{ route('posts.create') }} ">Create new post</a>

    @foreach ($posts as $post)
        {{-- <h3> {{ $post['title'] }} </h3> --}}
        <h3>
            {{-- <a href="/blog/{{ $post->id }}">
                {{ $post->title }}
            </a> --}}
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </h3>
    @endforeach
</x-layouts.app>
