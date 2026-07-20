@extends('master')

@section('content')

    <div class="w-full min-h-screen bg-gray-50 text-black flex flex-col items-center pt-20 pb-20 px-[4.5rem]">

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
                <li class="flex flex-row gap-x-4 bg-white border border-gray-200/80 shadow-xs p-5 rounded-xl min-h-[16.5rem] items-start">
                    <img src="{{ asset('product.png') }}" class="w-[200px] h-[230px] object-cover rounded-lg flex-shrink-0" alt="">
                    
                    <div class="flex flex-row justify-between w-full h-full">
                        <div class="flex flex-col gap-y-1 flex-1 pr-4">
                            <div class="text-xl font-semibold mb-1">
                                {{ $produto->nome }} 
                            </div>
    
                            <div class="text-sm">
                                Status: <strong class="ml-1">{{ $produto->ativo ? 'Ativo' : 'Inativo' }}</strong>
                            </div>

                            <div class="text-sm">
                                Código: <strong class="ml-1">{{ $produto->codigo }}</strong>
                            </div>
                            
                            <div class="text-sm">
                                Valor: <strong>R$ {{ $produto->valor }}</strong>
                            </div>
                            
                            <div class="text-sm">
                                Categoria: <strong class="ml-1">{{ $produto->category->nome }}</strong>
                            </div>

                            <div class="text-sm">
                                Quantidade: <strong class="ml-1">{{ $produto->quantidade }}</strong>
                            </div>

                            <div class="text-sm text-gray-600 break-words mt-1">
                                Descrição: <strong>{{ $produto->descricao }}</strong>
                            </div>
                        </div>

                        @if($produto->trashed())
                            <span class="text-gray-500 text-sm font-medium pt-1 flex-shrink-0">(Arquivado)</span>
                        @else
                            <div class="flex flex-row items-start flex-shrink-0 gap-x-3 pt-1">
                                <a href="{{ route('produto.edit', $produto->id) }}" class="font-medium">Editar</a>
                                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Deseja enviar este produto para a lixeira?')">
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