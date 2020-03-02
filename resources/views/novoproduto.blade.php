@extends('layouts.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos" method="POST">
                @csrf
                <div class="form-group ">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto"
                           id="nomeProduto" placeholder="Produto">
                    <label for="unidadesEstoque"></p>Unidades</label>
                    <input type="number" class="form-control" name="unidadesEstoque"
                           id="unidadesEstoque" placeholder="Unidades no Estoque">
                    <label for="preco"></p>Preço</label>
                    <input type="number" class="form-control" name="preco"
                           id="preco" placeholder="Preço">
                    <label for="categoria"></p>Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                        @foreach($cats as $c)
                        <option value="{{$c->id}}">{{$c->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection
