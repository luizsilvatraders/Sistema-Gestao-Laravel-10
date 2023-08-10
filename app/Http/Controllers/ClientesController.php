<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormeRequestClientes;
use App\Models\Cliente;
use App\Models\componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;

    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;

        $findCliente= $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');

        return  view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);

        if ($buscaRegistro) {
            $buscaRegistro->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Registro não encontrado.']);
        }
    }

    public function cadastrarCliente(FormeRequestClientes $request)
    {
        if ($request->method() == "POST") {
            //post cria cadastro de cliente
            $data = $request->all();
            Cliente::create($data);

            Toastr::success('Cliente cadastrado com sucesso !');
            return redirect()->route('clientes.index');
        }
        //pagina formulario criar novos produtos e mostrar lista
        return view('pages.clientes.create');
    }

    public function atualizarCliente(Request $request, $id)
    {
        if ($request->method() == "PUT") {

            //atualiza dados no banco
            $data = $request->all();
            $componentes = new componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('produto.index');
        }
        //pagina atuliza
        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findCliente'));
    }
}
