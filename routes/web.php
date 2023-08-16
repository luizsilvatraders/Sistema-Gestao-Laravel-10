<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendaController;
use App\Models\Venda;
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
    return view('index');
});

route::prefix('produtos')->group(function() {

    route::get('/', [ProdutosController::class, 'index'])->name('produto.index');

    //Cadastro Create
    route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');

    //Atualiza Update
    route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');

    route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

route::prefix('clientes')->group(function() {

    route::get('/', [ClientesController::class, 'index'])->name('clientes.index');

    //Cadastro Create
    route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');

    //Atualiza Update
    route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');

    route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

route::prefix('vendas')->group(function() {

    route::get('/', [VendaController::class, 'index'])->name('vendas.index');

    //Cadastro Create
    route::post('/cadastrarVenda', [VendaController::class, 'cadastrarVendas'])->name('cadastrar.venda');
    route::get('/cadastrarVenda', [VendaController::class, 'cadastrarVendas'])->name('cadastrar.venda');
    route::get('/enviarComprovantePorEmail/{id}', [VendaController::class, 'enviarComprovantePorEmail'])->name('enviarComprovantePorEmail.venda');
});
