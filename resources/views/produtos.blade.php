@extends('master')

@section('content')
    <a href="{{ route('produto.create') }}">Cadastrar</a>

    <h1>Produtos</h1>

    @if(session()->has('message'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session()->get('message') }}
        </div>
    @endif

    <ul>
        @foreach ($produtos as $produto)
            <li>
                {{ $produto->nome }} | R$ {{ $produto->valor }} | 
                
                <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a> | 
                
                <form action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Deseja realmente excluir este produto?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline; padding: 0; font-family: inherit; font-size: inherit;">
                        Excluir
                    </button>
                </form> | 
                
                <a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Show</a>
            </li>
        @endforeach
    </ul>
@endsection