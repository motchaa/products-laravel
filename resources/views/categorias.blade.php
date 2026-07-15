@extends('master')

@section('content')
    <a href="{{ route('categoria.create') }}">Cadastrar</a>

    <h1>Categorias</h1>

    @foreach ($categorias as $categoria)
        <li>{{ $categoria->nome }} | {{ $categoria->descricao }} | <a href="">Editar</a> | <a href="">Excluir</a></li>
    @endforeach
@endsection
