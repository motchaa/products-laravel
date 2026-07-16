@extends('master')

@section('content')
    <a href="{{ route('produto.create') }}">Cadastrar</a>

    <h1>Produtos</h1>

    @foreach ($produtos as $produto)
        <li>{{ $produto->nome }} | R$ {{ $produto->valor }} | <a href="">Editar</a> | <a href="">Excluir</a> | <a href=" {{ route('produto.show', ['produto' => $produto->id]) }}">Show</a>
        </li>
    @endforeach
@endsection
