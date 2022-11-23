<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use Daoo\Aula03\controller\api\Produto;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ola', function () {
    return "olá laravel";
});


Route::get('/ola',[HomeController::class,'index']);
Route::get('/produtos',
    [ProdutoController::class,'index']);

Route::get('/produtos/{id}',
    [ProdutoController::class,'show']);

Route::get('/produto',[
    ProdutoController::class,
    'create'
]);

Route::post('/produto',[
    ProdutoController::class,
    'store'
]);

Route::get('/produto/{id}/edit',
    [ProdutoController::class,'edit'])->name('edit');

Route::post('/produto/{id}/update',
    [ProdutoController::class,'update'])->name('update');

Route::get('/produto/{id}/delete',
    [ProdutoController::class,'delete'])->name('delete');

Route::post('/produto/{id}/remove',
    [ProdutoController::class,'remove'])->name('remove');
