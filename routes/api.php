<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('produto', [ProdutoController::class, 'store']);

Route::get('produto', [ProdutoController::class, 'index']);

Route::put('produto{id}', [ProdutoController::class, 'update']);

Route::delete('produto/{id}', [ProdutoController::class, 'delete']);

Route::get('produto/{id}', [ProdutoController::class, 'show']);

Route::get('produto/find/name', [ProdutoController::class, 'findByName']);

Route::get('produto/find/maior', [ProdutoController::class, 'pesquisarValorMaiorQue']);

Route::get('produto/find/entre/valores', [ProdutoController::class, 'pesquisarEntreValores']);

Route::get('produto/find/marca', [ProdutoController::class,'findByMarca']);

Route::get('produto/find/ano', [ProdutoController::class, 'pesquisarPorAno']);

Route::get('produto/find/mes', [ProdutoController::class, 'pesquisarPorMes']);

#Clientes
Route::post('clientes', [ClienteController::class, 'store']);

Route::get('cliente/find/email', [ClienteController::class, 'findByEmail']);

Route::get('cliente/find/cpf', [ClienteController::class, 'findByCpf']);

Route::get('cliente/find/cidade', [ClienteController::class, 'findByCidade']);

Route::get('cliente/find/estado', [ClienteController::class, 'findByEstado']);

Route::get('cliente/find/ano', [ClienteController::class, 'findByAno']);

Route::get('cliente/find/mes', [ClienteController::class, 'findByMes']);

Route::get('cliente/find/mesAno', [ClienteController::class, 'pesquisarPorMesAno']);

Route::get('cliente/find/bairro', [ClienteController::class, 'findByBairro']);

Route::get('cliente/index', [ClienteController::class, 'index']);

Route::get('cliente{id}', [ClienteController::class, 'show']);