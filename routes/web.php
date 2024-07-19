<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PeliculaController;
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
/**************************     LIBROS      ********************************** */
Route::get('/libros', [LibrosController::class, 'index']);
Route::get('/libros/nuevo', [LibrosController::class, 'create']);
Route::post('/libros', [LibrosController::class, 'store']);
//para etiqueta <a></a>
Route::get('/libros/eliminar/{id}', [LibrosController::class, 'destroy']);
//para etiqueta <form></form>
Route::delete('/libros/{id}', [LibrosController::class, 'destroy']);
Route::get('/libros/{id}', [LibrosController::class, 'edit']);
Route::put('/libros/{id}', [LibrosController::class, 'update']);
/***************************    GENEROS     ************************************ */
Route::get('/generos', [GeneroController::class, 'index']);
Route::get('/generos/nuevo', [GeneroController::class, 'create']);
Route::post('/generos', [GeneroController::class, 'store']);
Route::delete('/generos/{id}', [GeneroController::class, 'destroy']);
Route::get('/generos/{id}', [GeneroController::class, 'edit']);
Route::put('/generos/{id}', [GeneroController::class, 'update']);
/***************************    PELICULAS     ************************************ */
Route::get('/peliculas', [PeliculaController::class, 'index']);
Route::get('/peliculas/nuevo', [PeliculaController::class, 'create']);
Route::post('/peliculas', [PeliculaController::class, 'store']);
Route::delete('/peliculas/{id}', [PeliculaController::class, 'destroy']);
Route::get('/peliculas/{id}', [PeliculaController::class, 'edit']);
Route::put('/peliculas/{id}', [PeliculaController::class, 'update']);
/************************       CARTELERA       ************************************ */
Route::get('/cartelera', [PeliculaController::class, 'show']);
/***************************    Clientes     ************************************ */
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/nuevo', [ClienteController::class, 'create']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);
Route::get('/clientes/{id}', [ClienteController::class, 'edit']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
/***************************    PEDIDO     ************************************ */
Route::get('/pedidos', [PedidoController::class, 'index']);
Route::get('/pedidos/nuevo', [PedidoController::class, 'create']);
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);
Route::get('/pedidos/{id}', [PedidoController::class, 'edit']);
Route::put('/pedidos/{id}', [PedidoController::class, 'update']);