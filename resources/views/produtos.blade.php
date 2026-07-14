@extends('master')

@section('content')
    <h1>Produtos</h1>

    @foreach ($produtos as $produto)
        <li>{{ $produto->nome }} | R$ {{ $produto->valor }} | {{ $produto->quantidade }} | {{ $produto->codigo }} | {{ $produto->category->nome }} </li>
    @endforeach
@endsection
