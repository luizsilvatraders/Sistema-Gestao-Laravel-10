@extends('index')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Produtos</h1>
        </div>

        <div>
            <form action="{{ route('produto.index') }}" method="get">
                <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="pesquisar" placeholder="Digite o pesquisa">
                            <button class="btn btn-light" type="submit">Pesquisar</button>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="" class="btn btn-success">
                            Incluir Produto
                        </a>
                    </div>
                </div>
            </form>
            <div class="table-responsive mt-4">
                @if ($findProduto->isEmpty())
                    <p>Não existe produto!</p>
                @else
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($findProduto as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ 'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="" class="btn btn-info btn-sm">Editar</a>

                                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                                            <a onclick="deleteRegistroPaginacao('{{ route('produto.delete') }}', {{ $produto->id }})"
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
