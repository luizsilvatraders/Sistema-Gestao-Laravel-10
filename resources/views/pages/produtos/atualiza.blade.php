@extends('index')

@section('content')
<form class="form" method="POST" action="{{route('atualizar.produto', $findProduto->id)}}">
    @csrf
    @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Produtos</h1>
        </div>

        <div class="mb-3">
            <label for="nome"  class="form-label">Nome</label>
            <input type="text" id="nome" value="{{ isset($findProduto->nome) ? $findProduto->nome : old('nome') }}" class="form-control @error('nome')
                is-invalid
            @enderror" name="nome">

            @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="input_valor_mask" class="form-label">Valor</label>
            <input id="input_valor_mask" value="{{ isset($findProduto->valor) ? $findProduto->valor : old('valor') }}" class="form-control @error('valor')
                is-invalid
            @enderror" name="valor">

            @if ($errors->has('valor'))
                <div class="invalid-feedback">{{ $errors->first('valor')}}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection
