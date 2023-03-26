<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
