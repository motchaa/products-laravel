@extends('master')

@section('content')

@if(session()->has('message'))
    {{ session()->get('message') }}
@endif


<div class="w-full flex bg-gray-50 justify-center py-35 h-screen">
    <form class="w-[40%] bg-white border h-fit border-gray-200/80 shadow-xs rounded-xl py-[2.5rem] flex flex-col items-center gap-y-5" action="{{ route('categoria.update', ['categoria' => $categoria->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="flex flex-col w-[80%] gap-y-[0.5rem]">
            <label class="text-xl" for="nome">Nome</label>
            <input class="bg-gray-50 text-black p-[0.5rem] rounded-lg border border-gray-200/80 shadow-xs" type="text" name="nome" value="{{ $categoria->nome }}">
        </div>

        <div class="flex flex-col w-[80%] gap-y-[0.5rem]">
            <label class="text-xl" for="descricao">Descrição</label>
            <input class="bg-gray-50 text-black p-[0.5rem] rounded-lg border border-gray-200/80 shadow-xs" type="text" name="descricao" value="{{ $categoria->descricao }}">
        </div>

        <button
            type="submit"
            class="mt-[1rem] w-[80%] bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold py-[0.6rem] rounded-lg shadow-sm tracking-wide transition-colors duration-200"
        >
            Atualizar
        </button>

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
</div>

@endsection