<?php

use App\Http\Controllers\LibrosController;
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

Route::get('/libros', [LibrosController::class, 'index']);
Route::get('/libros/nuevo', [LibrosController::class, 'create']);
Route::post('/libros', [LibrosController::class, 'store']);
//para etiqueta <a></a>
Route::get('/libros/eliminar/{id}', [LibrosController::class, 'destroy']);
//para etiqueta <form></form>
Route::delete('/libros/{id}', [LibrosController::class, 'destroy']);
Route::get('/libros/{id}', [LibrosController::class, 'edit']);
Route::put('/libros/{id}', [LibrosController::class, 'update']);