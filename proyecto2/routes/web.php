<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('sale', SaleController::class);

Route::middleware('auth')->group(function () {
    Route::get('/animal', [AnimalController::class, 'index'])->name('animals.index');
    Route::get('/animal/create', [AnimalController::class, 'create'])->name('animals.form');
    Route::post('/animal', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animal/{animal}', [AnimalController::class, 'show'])->name('animals.show');
    Route::get('/animal/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::patch('/animal/{animal}', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animal/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
});
// Route::get('/animal', [AnimalController::class, 'index'])->name('animals.index');
// Route::get('/animal/create', [AnimalController::class, 'create'])->name('animals.form');
// Route::post('/animal', [AnimalController::class, 'store'])->name('animals.store');
// Route::get('/animal/{animal}', [AnimalController::class, 'show'])->name('animals.show');
// Route::get('/animal/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
// Route::patch('/animal/{animal}', [AnimalController::class, 'update'])->name('animals.update');
// Route::delete('/animal/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
