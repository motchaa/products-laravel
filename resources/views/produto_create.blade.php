@extends('master')

@section('content')

@if(session()->has('message'))
    {{ session()->get('message') }}
@endif

<h2>Create</h2>

<form action="{{ route('produto.store') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome Produto">
    <input type="text" name="descricao" placeholder="Descrição do Produto">
    <input type="text" name="codigo" placeholder="Código">
    <input type="number" name="valor" step="0.01" placeholder="Valor">
    <input type="number" name="quantidade" placeholder="Quantidade">
    
    <select name="categoria_id" id="categoria_id" required>
        <option value="">Selecione uma categoria</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
    @error('categoria_id') <span style="color: red;">{{ $message }}</span> @enderror
    
    <button type="submit">Create</button>
</form>

@endsection