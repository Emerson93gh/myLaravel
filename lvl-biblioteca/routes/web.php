<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\MemberController;
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