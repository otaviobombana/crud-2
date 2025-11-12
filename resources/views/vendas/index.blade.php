<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Lista de Vendas</h1>

        <a href="{{ route('vendas.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            Nova Venda
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
                    <th class="px-4 py-2 border-b">Cliente</th>
                    <th class="px-4 py-2 border-b">Data</th>
                    <th class="px-4 py-2 border-b">Valor Total</th>
                    <th class="px-4 py-2 border-b">Forma de Pagamento</th>
                    <th class="px-4 py-2 border-b text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendas as $venda)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-800">
                        <td class="px-4 py-2 border-b">{{ $venda->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $venda->cliente->nome ?? '—' }}</td>
                        <td class="px-4 py-2 border-b">{{ $venda->data }}</td>
                        <td class="px-4 py-2 border-b">R$ {{ number_format($venda->valortotal, 2, ',', '.') }}</td>
                        <td class="px-4 py-2 border-b">{{ $venda->formapgto }}</td>
                        <td class="px-4 py-2 border-b text-center space-x-2">
                            <a href="{{ route('vendas.show', $venda) }}" class="text-blue-500 hover:underline">Ver</a>
                            <a href="{{ route('vendas.edit', $venda) }}" class="text-yellow-500 hover:underline">Editar</a>
                            <form action="{{ route('vendas.destroy', $venda) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Deseja excluir esta venda?')" class="text-red-500 hover:underline">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                            Nenhuma venda encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($vendas->hasPages())
    <div class="pagination mt-3 d-flex justify-content-between align-items-center">
        <div class="pagination-info">
            <small>
                Mostrando {{ $vendas->firstItem() }}–{{ $vendas->lastItem() }}
                de {{ $vendas->total() }} vendas
            </small>
        </div>

        <div class="pagination-links">
            {{ $vendas->links() }}
        </div>
    </div>
@endif

    </div>
</x-layouts.app>
