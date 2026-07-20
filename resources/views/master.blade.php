<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Laravel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex flex-col min-h-screen">

    <header class="bg-emerald-700 text-white w-full h-[7rem] flex items-center justify-between px-[3rem]">
        <img class="w-[300px] h-[100px] mt-[-1rem]" src="{{ asset('logo.svg') }}" alt="Logo">

        <nav class="flex flex-row gap-x-6">
            <a href="{{ route('produto.index') }}" class="hover:text-emerald-200 transition-colors duration-150">Produtos</a>
            <a href="{{ route('categoria.index') }}" class="hover:text-emerald-200 transition-colors duration-150">Categorias</a>
        </nav>

        <div class="flex flex-row gap-x-4">
            <a href="{{ route('produto.create') }}" class="hover:text-emerald-200 transition-colors duration-150">+ Produto</a>
            <a href="{{ route('categoria.create') }}" class="hover:text-emerald-200 transition-colors duration-150">+ Categoria</a>
        </div>
    </header>

    <div class="flex-1">
        @yield('content')
    </div>
    </div>

    <footer class="w-full bg-emerald-800 text-white mt-10">
        <div class="max-w-6xl mx-auto px-8 py-10 flex flex-col md:flex-row justify-between items-start gap-8">

            {{-- Branding --}}
            <div class="flex flex-col gap-2 max-w-xs">
                <span class="text-lg font-semibold tracking-wide text-emerald-300">Controle de Produtos</span>
                <p class="text-sm text-emerald-100/70 leading-relaxed">
                    Sistema de gerenciamento de produtos e categorias desenvolvido para facilitar o controle do seu inventário.
                </p>
            </div>

            {{-- Navegação --}}
            <div class="flex flex-col gap-2">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-400 mb-1">Navegação</span>
                <a href="{{ route('produto.index') }}" class="text-sm text-emerald-100/80 hover:text-white transition-colors duration-150">Produtos</a>
                <a href="{{ route('categoria.index') }}" class="text-sm text-emerald-100/80 hover:text-white transition-colors duration-150">Categorias</a>
            </div>

            {{-- Desenvolvedor --}}
            <div class="flex flex-col gap-2">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-400 mb-1">Desenvolvedor</span>
                <span class="text-sm text-emerald-100/80">motcha</span>
                <span class="text-sm text-emerald-100/60">Thiago Mota</span>
            </div>

        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-emerald-700/60 py-4">
            <p class="text-center text-xs text-emerald-100/50 tracking-wide">
                &copy; {{ date('Y') }} Controle de Produtos &mdash; Todos os direitos reservados. Desenvolvido por <span class="text-emerald-300 font-medium">motcha</span>.
            </p>
        </div>
    </footer>
</body>
</html>