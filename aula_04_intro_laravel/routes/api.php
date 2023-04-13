<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
                return $request->user();
    });

Route::get('produtos',[ProdutoController::class,'index']);
Route::get('produtos/{id}',[ProdutoController::class,'show']);
Route::post('produtos',[ProdutoController::class,'store']);
Route::put('produtos/{id}',[ProdutoController::class,'update'])
        ->middleware(['auth:sanctum','ability:is-admin']);
Route::delete('produtos/{id}',[ProdutoController::class,'remove']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('fornecedores',FornecedorController::class)
    ->parameters([
        'fornecedores'=>'fornecedor'
    ]);

    Route::get('fornecedores/{fornecedor}/produtos',
        [FornecedorController::class,
        'produtos'
    ]);

    Route::put('/fornecedores/{fornecedor}',[FornecedorController::class,'update'])
        ->middleware('ability:is-admin');

    Route::apiResource('users',UserController::class);
});

Route::post('/users',[UserController::class,'store']);
Route::post('login',[LoginController::class,'login']);


Route::prefix('app')->middleware('app_api_key')->group(function(){

    Route::get('{api_key}/{name}', function (Request $request) {
        return response()->json([
            'name' => $request->name,
        ]);
    });

    Route::post('{name}', function (Request $request) {
        return response()->json([
            'name' => $request->name,
        ]);
    });

});


