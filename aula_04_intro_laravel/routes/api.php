<?php

use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('produto',[ProdutoController::class,'index']);
Route::get('produto/{id}',[ProdutoController::class,'show']);
Route::post('produto',[ProdutoController::class,'store']);
Route::put('produto/{id}',[ProdutoController::class,'update']);
Route::delete('produto/{id}',[ProdutoController::class,'remove']);

Route::apiResource('fornecedor',FornecedorController::class);
