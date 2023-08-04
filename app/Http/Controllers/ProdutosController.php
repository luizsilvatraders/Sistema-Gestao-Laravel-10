<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;

    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;

        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');

        return  view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Produto::find($id);

        if ($buscaRegistro) {
            $buscaRegistro->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Registro não encontrado.']);
        }
    }

    public function cadastrarProduto(FormRequestProduto $request)
    {
        if ($request->method() == "POST") {
            //post cria os dados e inclui no banco
            $data = $request->all();
            $componentes = new componentes();

            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);

            Toastr::success('Produto cadastrado com sucesso !');
            return redirect()->route('produto.index');
        }
        //pagina formulario criar novos produtos e mostrar lista
        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == "PUT") {

            //atualiza dados no banco
            $data = $request->all();
            $componentes = new componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('produto.index');
        }
        //pagina atuliza
        $findProduto = Produto::where('id', '=', $id)->first();

        return view('pages.produtos.atualiza', compact('findProduto'));
    }
}
