<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    public function index(){
        // $posts = [
        //     ['title' => 'First post'],
        //     ['title' => 'Second post'],
        //     ['title' => 'Third post'],
        //     ['title' => 'Fourth post'],
        // ];

        // Mostrar datos de una tabla en la DB
        // $posts = DB::table('posts')->get();

        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    // public function show($post) {
    //     //return "Post detail $post";
    //     return Post::findOrFail($post);
    // }
    // una forma mas abreviada de mostrar el detalle de la seleccion
    public function show(Post $post) {
        //return $post;
        return view('posts.show', ['post' => $post]);
    }

    // Normalizando formularios edit y create
    public function create(){
        return view('posts.create', ['post' => new Post]);
    }

    public function store(Request $request){
        // validaciones del formulario y mensajes de error en espanol
        // $request->validate([
        //     'title' => ['required', 'min:4'],
        //     'body' => ['required'],
        // ], [
        //     'title.required' => 'Error: Es obligatotio el campo :attribute',
        //     'title.min' => 'Error: Ingresar al menos 4 caracteres',
        //     'body.required' => 'Error: Es obligatotio el campo :attribute',
        // ]);

        // otra forma de validacion con variable
        $validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ], [
            'title.required' => 'Error: Es obligatotio el campo :attribute',
            'title.min' => 'Error: Ingresar al menos 4 caracteres',
            'body.required' => 'Error: Es obligatotio el campo :attribute',
        ]);
        //dd($validated);

        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        // otra forma de crear un nuevo registro - ir a modelo y agregar propiedad fillable
        // Post::create([
        //     'title' => $request->input('title'),
        //     'body' => $request->input('body'),
        // ]);

        // otra forma utilizando la variable de validacion - " fillable "
        Post::create($validated);

        session()->flash('status', 'Post created!');

        // return redirect()->route('posts.index');
        return to_route('posts.index');
    }

    public function edit(Post $post){
        // return $post;
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post){
        // $request->validate([
        //     'title' => ['required', 'min:4'],
        //     'body' => ['required'],
        // ], [
        //     'title.required' => 'Error: Es obligatotio el campo :attribute',
        //     'title.min' => 'Error: Ingresar al menos 4 caracteres',
        //     'body.required' => 'Error: Es obligatotio el campo :attribute',
        // ]);

        // otra forma con variable
        $validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ], [
            'title.required' => 'Error: Es obligatotio el campo :attribute',
            'title.min' => 'Error: Ingresar al menos 4 caracteres',
            'body.required' => 'Error: Es obligatotio el campo :attribute',
        ]);

        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        // otra forma de actualizar registros
        // $post->update([
        //     'title' => $request->input('title'),
        //     'body' => $request->input('body'),
        // ]);

        // otra forma utilizando la variable de validacion
        $post->update($validated);

        session()->flash('status', 'Post updated!');

        return to_route('posts.show', $post);
    }
}
