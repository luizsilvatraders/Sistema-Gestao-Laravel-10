<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;

        $findUsuario = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? '');

        return  view('pages.usuario.paginacao', compact('findUsuario'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = User::find($id);

        if ($buscaRegistro) {
            $buscaRegistro->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Registro não encontrado.']);
        }
    }

    public function cadastrarUsuario(UsuarioFormRequest $request)
    {
        if ($request->method() == "POST") {
            //post cria os dados e inclui no banco
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            User::create($data);

            Toastr::success('Usuario cadastrado com sucesso !');
            return redirect()->route('usuario.index');
        }
        //pagina formulario criar novos produtos e mostrar lista
        return view('pages.usuario.create');
    }

    public function atualizarUsuario(UsuarioFormRequest $request, $id)
    {
        if ($request->method() == "PUT") {

            //atualiza dados no banco
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Usuario atualizado com sucesso !');
            return redirect()->route('usuario.index');
        }
        //pagina atuliza
        $findUsuario = User::where('id', '=', $id)->first();

        return view('pages.usuario.atualiza', compact('findUsuario'));
    }
}
