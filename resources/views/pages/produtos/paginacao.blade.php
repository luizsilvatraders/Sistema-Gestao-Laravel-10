@extends('index')

@Section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>

    <div>
        <form action="" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button class="btn btn-light">Pesquisar</button>
            <a type="buton" href="" class="btn btn-success float-end">
                Incluir Produto
            </a>
        </form>
    </div>
@endsection
