<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Lista de Produtos</h1>

        <a href="{{ route('produtos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            + Novo Produto
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-zinc-300 dark:border-zinc-700">
            <thead>
                <tr class="bg-zinc-100 dark:bg-zinc-800">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Descrição</th>
                    <th class="border p-2">Preço</th>
                    <th class="border p-2">Categoria</th>
                    <th class="border p-2">Fornecedor</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produtos as $produto)
                    <tr>
                        <td class="border p-2">{{ $produto->id }}</td>
                        <td class="border p-2">{{ $produto->descricao }}</td>
                        <td class="border p-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td class="border p-2">{{ $produto->categoria->descricao ?? '-' }}</td>
                        <td class="border p-2">{{ $produto->fornecedor->nome ?? '-' }}</td>
                        <td class="border p-2 text-center">
                            <a href="{{ route('produtos.edit', $produto) }}" class="text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Excluir este produto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4">Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($produtos->hasPages())
    <div class="pagination">
        <div class="pagination-info">
            {{ $produtos->firstItem() }}–{{ $produtos->lastItem() }}
            de {{ $produtos->total() }}
        </div>

        <div class="pagination-links">
            {{ $produtos->links() }}
        </div>
    </div>
@endif

    </div>
</x-layouts.app>
