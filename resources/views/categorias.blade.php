@extends('master')

@section('content')
    <h1>Categorias</h1>

    @foreach ($categorias as $categoria)
        <li>{{ $categoria->nome }} | {{ $categoria->descricao }}</li>
    @endforeach
@endsection
