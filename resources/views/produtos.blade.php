@extends('master')

@section('content')
    <a href="{{ route('produto.create') }}">Cadastrar</a>

    <h1>Produtos</h1>

    @if(session()->has('message'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="{{ route('produto.index') }}" method="GET" style="margin-bottom: 20px;">
        <input 
            type="text" 
            name="search" 
            list="descricoes"
            placeholder="Buscar por descrição..." 
            value="{{ $search ?? '' }}" 
            style="padding: 5px; width: 250px; margin-right: 10px;"
            autocomplete="off"
        >
        
        <datalist id="descricoes">
            @foreach($sugestoes as $sugestao)
                <option value="{{ $sugestao }}">
            @endforeach
        </datalist>

        <button type="submit" style="padding: 5px 12px;">Buscar</button>

        <select name="categoria_id" style="padding: 6px; margin-right: 10px;">
            <option value="">Todas as Categorias</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id }}" {{ ($categoriaId == $cat->id) ? 'selected' : '' }}>
                    {{ $cat->nome }}
                </option>
            @endforeach
        </select>

        <select name="status" style="padding: 6px; margin-right: 10px;">
            <option value="1" {{ ($status === '1') ? 'selected' : '' }}>Ativos</option>
            <option value="0" {{ ($status === '0') ? 'selected' : '' }}>Inativos</option>
        </select>

        @if($search || $categoriaId || (isset($status) && $status === '0'))
            <a href="{{ route('produto.index') }}" style="margin-left: 15px; color: red; text-decoration: underline;">
                @if($search && !$categoriaId && $status !== '0')
                    Limpar Busca
                @else
                    Limpar Filtros
                @endif
            </a>
        @endif
    </form>

    <ul>
        @foreach ($produtos as $produto)
            <li>
                {{ $produto->nome }} | Status: <strong>{{ $produto->ativo ? 'Ativo' : 'Inativo' }}</strong> |

                @if($produto->trashed())
                    <span style="color: gray; margin-right: 10px;">(Arquivado)</span>

                @else
                    <a href="{{ route('produto.edit', $produto->id) }}" style="margin-left: 10px;">Editar</a>

                    <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" style="display:inline; margin-left: 10px;" onsubmit="return confirm('Deseja enviar este produto para a lixeira?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline;">
                            Excluir
                        </button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endsection