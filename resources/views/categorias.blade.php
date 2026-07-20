@extends('master')

@section('content')
    <header class="bg-emerald-700 text-white w-full h-[7rem] flex items-center gap-x-[21.5rem]">
        <img class="w-[300px] h-[80px] ml-[3rem]" src="{{ asset('alece-logo.png') }}" alt="">

        <div class="flex flex-row gap-x-5">
            <a href="{{ route('produto.index') }}">Produtos</a>
            <a href="{{ route('categoria.index') }}">Categorias</a>
        </div>

        <div class="ml-[8rem]">
            <a href="{{ route('categoria.create') }}">Cadastrar</a>
        </div>
    </header>

    <div class="w-full min-h-screen bg-gray-50 text-black flex flex-col items-center pt-20 px-[4.5rem]">
        @if(session()->has('message'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session()->get('message') }}
            </div>
        @endif

        <form class="bg-white border border-gray-200/80 shadow-xs p-3 rounded-xl  flex flex-row justify-between" action="{{ route('categoria.index') }}" method="GET" style="margin-bottom: 20px;">
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
                <li class="flex flex-row gap-x-2 bg-white border border-gray-200/80 shadow-xs p-5 rounded-xl">
                    <div class="flex flex-row justify-between w-full">
                        <div class="flex flex-col">
                            <div class="flex flex-row text-xl">
                                {{ $categoria->nome }}
                            </div>

                            <div class="flex flex-row">
                                Descrição: <strong class="ml-1">{{ $categoria->descricao }}</strong>
                            </div>
                        </div>

                        <div class="flex flex-row">
                            <a href="{{ route('categoria.edit', ['categoria' => $categoria->id]) }}" style="margin-left: 10px;">Editar</a>
                            <form action="{{ route('categoria.destroy', ['categoria' => $categoria->id]) }}" method="POST" style="display:inline; margin-left: 10px;" onsubmit="return confirm('Deseja realmente excluir esta categoria?')">
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
