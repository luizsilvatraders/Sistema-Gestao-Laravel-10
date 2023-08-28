@extends('index')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Usuario</h1>
        </div>

        <div>
            <form action="{{ route('usuario.index') }}" method="get">
                <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="pesquisar" placeholder="Digite o pesquisa">
                            <button class="btn btn-secondary" type="submit">Pesquisar</button>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="{{ route('cadastrar.usuario') }}" class="btn btn-success">
                            Incluir Usuario
                        </a>
                    </div>
                </div>
            </form>
            <div class="table-responsive mt-4">
                @if ($findUsuario->isEmpty())
                    <p>Não existe este usuário!</p>
                @else
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($findUsuario as $usuario)
                                <tr>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group">

                                            <a href=" {{route('atualizar.usuario', $usuario->id) }}" class="btn btn-info btn-sm">Editar</a>

                                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                                            <a onclick="deleteRegistroPaginacao('{{ route('usuario.delete') }}', {{ $usuario->id }})"
                                                class="btn btn-danger btn-sm">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
