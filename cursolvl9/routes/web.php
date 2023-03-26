<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// otra forma de definir una ruta es
Route::view('/', 'welcome')->name('home');

/* Hacer las siguientes rutas
localhost/ -> welcome
localhost/contacto -> contac
localhost/blog -> blog
localhost/acerca-de-mi -> about
*/
Route::view('/contacto', 'contact')->name('contact');
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
Route::view('/about', 'about')->name('about');
