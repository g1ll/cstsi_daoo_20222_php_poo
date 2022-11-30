<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(ProdutoController::class)
    ->group(function () {

        Route::prefix('/produtos')->group(function () {
            Route::get('/', 'index')->name('produtos');
            Route::get('/{id}', 'show');
        });

        Route::prefix('/produto')
            ->middleware('auth')
            ->group(function () {
                Route::get('/', 'create');
                Route::post('/', 'store');

                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/{id}/update', 'update')->name('update');

                Route::get('/{id}/delete', 'delete')->name('delete');
                Route::post('/{id}/remove', 'remove')->name('remove');
            });
    });
