@extends('master')

@section('content')
    <h1>{{ $produto->nome }}</h1>
    <p><strong>Código:</strong> {{ $produto->codigo }}</p>
    <p><strong>Valor:</strong> R$ {{ $produto->valor }}</p>
    <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
    <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>
    <p><strong>Categoria:</strong> {{ $produto->categoria_id}}</p>
@endsection
