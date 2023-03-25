<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $posts = DB::table('posts')->get();

        return view('blog', ['posts' => $posts]);
    }
}
