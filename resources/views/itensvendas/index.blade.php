<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Itens de Venda</h1>

        <a href="{{ route('itensvendas.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            Novo Item
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200 dark:bg-zinc-900 dark:border-zinc-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-zinc-800">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Venda</th>
                    <th class="px-4 py-2 border-b">Produto</th>
                    <th class="px-4 py-2 border-b">Qtd</th>
                    <th class="px-4 py-2 border-b">Valor Unitário</th>
                    <th class="px-4 py-2 border-b">Subtotal</th>
                    <th class="px-4 py-2 border-b text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itens as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-800">
                        <td class="px-4 py-2 border-b">{{ $item->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->venda->id ?? '—' }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->produto->descricao ?? '—' }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->quantidade }}</td>
                        <td class="px-4 py-2 border-b">R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}</td>
                        <td class="px-4 py-2 border-b">R$ {{ number_format($item->subtotal, 2, ',', '.') }}</td>
                        <td class="px-4 py-2 border-b text-center space-x-2">
                            <a href="{{ route('itensvendas.show', $item->id) }}" class="text-blue-500 hover:underline">Ver</a>
                            <a href="{{ route('itensvendas.edit', $item->id) }}" class="text-yellow-500 hover:underline">Editar</a>
                            <form action="{{ route('itensvendas.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Deseja realmente excluir este item?')"
                                        class="text-red-500 hover:underline">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($itens->hasPages())
            <div class="pagination mt-4 flex justify-between items-center">
                <div class="pagination-info text-sm text-gray-600 dark:text-gray-400">
                    {{ $itens->firstItem() }}–{{ $itens->lastItem() }}
                    de {{ $itens->total() }}
                </div>

                <div class="pagination-links">
                    {{ $itens->links() }}
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
