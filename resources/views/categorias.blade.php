@extends('master')

@section('content')
    <a href="{{ route('categoria.create') }}">Cadastrar</a>

    <h1>Categorias</h1>

    @foreach ($categorias as $categoria)
        <li>
            {{ $categoria->nome }} | {{ $categoria->descricao }} | 
            <a href="{{ route('categoria.edit', ['categoria' => $categoria->id]) }}">Editar</a> |
            <form action="{{ route('categoria.destroy', ['categoria' => $categoria->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Deseja realmente excluir esta categoria?')">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline; padding: 0; font-family: inherit; font-size: inherit;">
                    Excluir
                </button>
            </form> 
        </li>   
    @endforeach

    @if(session()->has('message'))
        <script>
            alert("{{ session()->get('message') }}");
        </script>
    @endif
@endsection
