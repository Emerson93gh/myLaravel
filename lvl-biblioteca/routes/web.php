<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'MemberController@index');
Route::get('/show', 'MemberController@getMembers');
Route::post('/save', 'MemberController@save');
Route::post('/delete', 'MemberController@delete');
Route::post('/update', 'MemberController@update');

Route::get('/empleado', [EmpleadosController::class, 'index'])->name('empleados.index');

Route::get('datatable/empleados', 'DatatableController@empleado')->name('datatable.empleado');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}/', [UserController::class, 'edit']);
Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
Route::get('/users/destroy/{id}/', [UserController::class, 'destroy']);

// Rutas para Autores
Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');
Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');
Route::get('/autores/edit/{id}/', [AutorController::class, 'edit']);
Route::post('/autores/update', [AutorController::class, 'update'])->name('autores.update');
Route::get('/autores/destroy/{id}/', [AutorController::class, 'destroy']);

// Rutas para Libros
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/edit/{id}/', [LibroController::class, 'edit']);
Route::post('/libros/update', [LibroController::class, 'update'])->name('libros.update');
Route::get('/libros/destroy/{id}/', [LibroController::class, 'destroy']);

// Rutas para Prestamos
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
Route::get('/prestamos/show/{id}/', [PrestamoController::class, 'show']);
Route::get('/prestamos/edit/{id}/', [PrestamoController::class, 'edit']);
Route::post('/prestamos/update', [PrestamoController::class, 'update'])->name('prestamos.update');
Route::get('/prestamos/destroy/{id}/', [PrestamoController::class, 'destroy']);
