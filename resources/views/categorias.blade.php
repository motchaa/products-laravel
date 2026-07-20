@extends('master')

@section('content')

    <div class="w-full min-h-screen bg-gray-50 text-black flex flex-col items-center pt-20 pb-20 px-[4.5rem]">

        <form class="bg-white border border-gray-200/80 shadow-xs p-3 rounded-xl flex flex-row justify-between" action="{{ route('categoria.index') }}" method="GET" style="margin-bottom: 20px;">
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

            @if($search)
                <a href="{{ route('categoria.index') }}" style="margin-left: 15px; color: red; text-decoration: underline;">
                    Limpar Busca
                </a>
            @endif
        </form>

        <ul class="flex flex-col gap-5 mt-10 w-[45%]">
            @foreach ($categorias as $categoria)
                <li class="flex flex-row gap-x-2 bg-white border border-gray-200/80 shadow-xs p-5 rounded-xl min-h-[6rem] items-start">
                    <div class="flex flex-row justify-between w-full h-full">
                        <div class="flex flex-col gap-y-1 flex-1 pr-4">
                            <div class="text-xl font-medium">
                                {{ $categoria->nome }}
                            </div>

                            <div class="text-sm text-gray-600 break-words">
                                Descrição: <strong>{{ $categoria->descricao }}</strong>
                            </div>
                        </div>

                        <div class="flex flex-row items-start flex-shrink-0 gap-x-3 pt-1">
                            <a href="{{ route('categoria.edit', ['categoria' => $categoria->id]) }}">Editar</a>
                            <form action="{{ route('categoria.destroy', ['categoria' => $categoria->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Deseja realmente excluir esta categoria?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline;">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
