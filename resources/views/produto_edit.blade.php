@extends('master')

@section('content')

<h2>Edit</h2>

@if(session()->has('message'))
    {{ session()->get('message') }}
@endif


<form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="nome" value="{{ $produto->nome }}">
    <input type="text" name="descricao" value="{{ $produto->descricao }}">
    <input type="text" name="codigo" value="{{ $produto->codigo }}">
    <input type="number" name="valor" step="0.01" value="{{ $produto->valor }}">
    <input type="number" name="quantidade" value="{{ $produto->quantidade }}">

    <select name="categoria_id" id="categoria_id" required>
        <option value="">Selecione uma categoria</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ (old('categoria_id', $produto->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
    @error('categoria_id') <span style="color: red;">{{ $message }}</span> @enderror

    <button type="submit">Atualizar</button>

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

@endsection