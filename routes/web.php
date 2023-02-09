<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

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

Route::get('/produto/cadastrar', function () {
    return view('produtocreate');
})->name('produto.add');
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');
Route::put('/produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.delete');
Route::post('/produto/search', [ProdutoController::class, 'search'])->name('produto.search');
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');
Route::get('/pedido/cliente/{id}', [PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido.show');
Route::put('/pedido/{id}', [PedidoController::class, 'update'])->name('pedido.update');
Route::post('/pedido/search', [PedidoController::class, 'search'])->name('pedido.search');
Route::delete('/pedido/{id}', [PedidoController::class, 'destroy'])->name('pedido.delete');
