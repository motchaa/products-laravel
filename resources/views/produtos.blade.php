@extends('master')

@section('content')
    <h1>Produtos</h1>

    @foreach ($produtos as $produto)
        <li>{{ $produto->nome }}</li>
    @endforeach
@endsection
