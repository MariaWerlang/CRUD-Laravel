<?php

use Illuminate\Support\Facades\Route;
use App\Models\Servicos;
use App\Http\Controllers\ServicosController;
use Illuminate\Http\Request;

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
    return view('index');
});

/*Rotas estabelecidas pelo Controller*/
Route::get('consultar', [ServicosController::class, 'consultar']);
Route::get('cadastrar-servicos', [ServicosController::class, 'index']);
Route::post('salvar-servicos', [ServicosController::class, 'salvar']);
Route::get('editar/{id}', [ServicosController::class, 'editar']);
Route::post('atualizar-servicos', [ServicosController::class, 'atualizar']);
Route::get('excluir-servicos/{id}', [ServicosController::class, 'excluir']);