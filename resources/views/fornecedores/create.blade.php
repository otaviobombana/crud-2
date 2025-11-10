<x-layouts.app>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Cadastrar Novo Fornecedor</h1>

        {{-- Mensagem de sucesso --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulário de criação --}}
        <form action="{{ route('fornecedores.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nome --}}
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Nome do Fornecedor
                </label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400
                              dark:bg-zinc-900 dark:border-zinc-700 dark:text-gray-100"
                       placeholder="Ex: Papelaria Central" required>
                @error('nome')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Telefone --}}
            <div>
                <label for="telefone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Telefone
                </label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400
                              dark:bg-zinc-900 dark:border-zinc-700 dark:text-gray-100"
                       placeholder="(11) 99999-9999">
                @error('telefone')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botões --}}
            <div class="flex justify-between pt-4">
                <a href="{{ route('fornecedores.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded
                          dark:bg-zinc-700 dark:text-gray-200 dark:hover:bg-zinc-600">
                    Voltar
                </a>

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
