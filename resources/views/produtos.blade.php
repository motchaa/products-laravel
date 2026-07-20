@extends('master')

@section('content')
    <header class="bg-emerald-700 text-white w-full h-[7rem] flex items-center gap-x-[21.5rem]">
        <img class="w-[300px] h-[80px] ml-[3rem]" src="{{ asset('alece-logo.png') }}" alt="">

        <div class="flex flex-row gap-x-5">
            <a href="{{ route('produto.index') }}">Produtos</a>
            <a href="{{ route('categoria.index') }}">Categorias</a>
        </div>

        <div class="ml-[8rem]">
            <a href="{{ route('produto.create') }}">Cadastrar</a>
        </div>
    </header>

    <div class="w-full min-h-screen bg-gray-50 text-black flex flex-col items-center pt-20 px-[4.5rem]">
        @if(session()->has('message'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session()->get('message') }}
            </div>
        @endif

        <form class="bg-white border border-gray-200/80 shadow-xs p-3 rounded-xl" action="{{ route('produto.index') }}" method="GET" style="margin-bottom: 20px;">
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

        <ul class="flex flex-col gap-5 mt-10 w-[45%]">
            @foreach ($produtos as $produto)
                <li class="flex flex-row gap-x-2 bg-white border border-gray-200/80 shadow-xs p-5 rounded-xl">
                    <img src="{{ asset('product.png') }}" class="w-[150px] h-[150px]" alt="">
                    
                    <div class="flex flex-row justify-between w-full">
                        <div class="flex flex-col">
                            <div class="flex flex-row text-xl">
                                {{ $produto->nome }} 
                            </div>
    
                            <div class="flex flex-row">
                                Status: <strong class="ml-1">{{ $produto->ativo ? 'Ativo' : 'Inativo' }}</strong>
                            </div>

                            <div class="flex flex-row">
                                Código: <strong class="ml-1">{{ $produto->codigo }}</strong>
                            </div>
                            
                            <div class="flex flex-row">
                                Valor: R$ {{ $produto->valor }}
                            </div>
                            
                            <div class="flex flex-row">
                                Categoria: <strong class="ml-1">{{ $produto->category->nome }}</strong>
                            </div>

                            <div class="flex flex-row">
                                Quantidade: <strong class="ml-1">{{ $produto->quantidade }}</strong>
                            </div>


                        </div>

                        @if($produto->trashed())
                            <span style="color: gray; margin-right: 10px;">(Arquivado)</span>
                        @else
                            <div class="flex flex-row">
                                <a href="{{ route('produto.edit', $produto->id) }}" style="margin-left: 10px;">Editar</a>
                                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" style="display:inline; margin-left: 10px;" onsubmit="return confirm('Deseja enviar este produto para a lixeira?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline;">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection