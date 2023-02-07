<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

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
    return view('index');
});

Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/cadastrar', function () {
    return view('clientecreate');
})->name('cliente.add');
Route::put('/cliente/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.delete');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::post('/cliente/search', [ClienteController::class, 'search'])->name('cliente.search');
Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');

Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/cadastrar', function () {
    return view('produtocreate');
})->name('produto.add');
