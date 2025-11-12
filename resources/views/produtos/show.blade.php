<x-layouts.app>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Produto</h1>

        <a href="{{ route('produtos.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">← Voltar</a>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded shadow p-6 space-y-3">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="text-sm text-gray-500">ID</h2>
                    <p class="font-medium">{{ $produto->id }}</p>
                </div>

                <div>
                    <h2 class="text-sm text-gray-500">Preço</h2>
                    <p class="font-medium">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                </div>

                <div class="col-span-2">
                    <h2 class="text-sm text-gray-500">Descrição</h2>
                    <p class="font-medium">{{ $produto->descricao }}</p>
                </div>

                <div>
                    <h2 class="text-sm text-gray-500">Categoria</h2>
                    <p class="font-medium">{{ $produto->categoria->descricao ?? '-' }}</p>
                </div>

                <div>
                    <h2 class="text-sm text-gray-500">Fornecedor</h2>
                    <p class="font-medium">{{ $produto->fornecedor->nome ?? '-' }}</p>
                </div>

                <div>
                    <h2 class="text-sm text-gray-500">Criado em</h2>
                    <p class="font-medium">{{ $produto->created_at ? $produto->created_at->format('d/m/Y H:i') : '-' }}</p>
                </div>

                <div>
                    <h2 class="text-sm text-gray-500">Atualizado em</h2>
                    <p class="font-medium">{{ $produto->updated_at ? $produto->updated_at->format('d/m/Y H:i') : '-' }}</p>
                </div>
            </div>

            <div class="pt-4 border-t border-zinc-100 dark:border-zinc-800 flex items-center space-x-3">
                <a href="{{ route('produtos.edit', $produto) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Editar</a>

                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" onsubmit="return confirm('Excluir este produto?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Excluir</button>
                </form>

                <a href="{{ route('produtos.index') }}" class="text-sm text-gray-500 hover:underline">Voltar à lista</a>
            </div>
        </div>
    </div>
</x-layouts.app>
