@extends('index')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Vendas</h1>
        </div>

        <div>
            <form action="{{ route('vendas.index') }}" method="get">
                <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="pesquisar" placeholder="Digite o pesquisa">
                            <button class="btn btn-secondary" type="submit">Pesquisar</button>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="{{ route('cadastrar.venda') }}" class="btn btn-success">
                            Incluir venda
                        </a>
                    </div>
                </div>
            </form>
            <div class="table-responsive mt-4">
                @if ($findVenda->isEmpty())
                    <p>Não existe venda!</p>
                @else
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Numeração</th>
                                <th>Produto</th>
                                <th>Cliente</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($findVenda as $venda)
                                <tr>
                                    <td>{{ $venda->numero_da_venda }}</td>
                                    <td>{{ $venda->produto->nome }}</td>
                                    <td>{{ $venda->cliente->nome }}</td>
                                    <td>
                                        <a href="{{ route('enviarComprovantePorEmail.venda',$venda->id)}}" class="btn btn-info btn-sm">Enviar E-mail</a>
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
