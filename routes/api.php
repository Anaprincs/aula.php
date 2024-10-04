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
Route::put('produto/update', [ProdutoController::class, 'update']);
Route::delete('produto/{id}', [ProdutoController::class, 'delete']);
Route::get('produto/{id}', [ProdutoController::class, 'show']);
Route::get('produto/find/name', [ProdutoController::class, 'findByName']);
Route::get('produto/find/maior', [ProdutoController::class, 'pesquisaValorMaiorQue']);
Route::get('produto/find/entre/valores', [ProdutoController::class, 'pesquisaEntreValores']);
Route::get('produto/find/marca', [ProdutoController::class, 'pesquisaEntreMarca']);
Route::get('produto/find/ano', [ProdutoController::class, 'pesquisaPorAno']);
Route::get('produto/find/mes', [ProdutoController::class, 'pesquisaPorMes']);


Route::get('cliente', [ClienteController::class, 'store']);
Route::get('cliente/find/email', [ClienteController::class, 'findByEmail']);
Route::get('cliente/find/CPF', [ClienteController::class, 'findByCPF']);
Route::get('cliente/find/cidade', [ClienteController::class, 'findByCidade']);
Route::get('cliente/find/estado', [ClienteController::class, 'findByEstado']);
Route::get('cliente/nascimento', [ClienteController::class, 'AnoNascimento']);
Route::get('cliente/mes', [ClienteController::class, 'MesNascimento']);
Route::get('cliente/mes/ano', [ClienteController::class, 'MesAno']);
Route::get('cliente/find/bairro', [ClienteController::class, 'findByBairro']);

Route::put('cliente/update', [ProdutoController::class, 'update']);
Route::delete('cliente/delete/{id}', [ProdutoController::class, 'delete']);
Route::get('clientes/find/name', [ProdutoController::class, 'findByName']);
Route::get('clientes/{id}', [ProdutoController::class, 'show']);
Route::get('clientes', [ProdutoController::class, 'index']);




