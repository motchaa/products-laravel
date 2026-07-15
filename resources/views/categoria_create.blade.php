@extends('master')

@section('content')

@if(session()->has('message'))
    {{ session()->get('message') }}
@endif

<h2>Create</h2>

<form action="{{ route('categoria.store') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome Categoria">
    <input type="text" name="descricao" placeholder="Descrição do Categoria">
    
    <button type="submit">Create</button>
</form>

@endsection