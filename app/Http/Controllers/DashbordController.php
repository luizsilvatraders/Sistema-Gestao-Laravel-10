<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {
        $totalProdutoCadastrado = $this->buscaTotalProdutosCadastrados();
        $totalClienteCadastrado = $this->buscaTotalClientesCadastrados();
        $totalVendaCadastrado = $this->buscaTotalVendasCadastrados();
        $totalUsuarioCadastrado = $this->buscaTotalUsuariosCadastrados();


        return view('pages.dashboard.dashboard', compact('totalProdutoCadastrado', 'totalClienteCadastrado', 'totalVendaCadastrado', 'totalUsuarioCadastrado'));
    }

    public function buscaTotalProdutosCadastrados()
    {
        $findProduto = Produto::all()->count();

        return $findProduto;
    }

    public function buscaTotalClientesCadastrados()
    {
        $findClientes = Cliente::all()->count();

        return $findClientes;
    }

    public function buscaTotalVendasCadastrados()
    {
        $findVendas = Venda::all()->count();

        return $findVendas;
    }

    public function buscaTotalUsuariosCadastrados()
    {
        $findUsuarios = User::all()->count();

        return $findUsuarios;
    }
}
