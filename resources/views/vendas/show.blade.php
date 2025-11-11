<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Venda #{{ $venda->id }}</h1>

        <a href="{{ route('vendas.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">
            ← Voltar para Lista
        </a>

        <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-lg p-6 space-y-2">
            <p><strong>Cliente:</strong> {{ $venda->cliente->nome ?? '—' }}</p>
            <p><strong>Data:</strong> {{ $venda->data }}</p>
            <p><strong>Valor Total:</strong> R$ {{ number_format($venda->valortotal, 2, ',', '.') }}</p>
            <p><strong>Forma de Pagamento:</strong> {{ $venda->formapgto }}</p>
        </div>

        <div class="mt-4 space-x-2">
            <a href="{{ route('vendas.edit', $venda) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Editar</a>
            <form action="{{ route('vendas.destroy', $venda) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Deseja excluir esta venda?')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Excluir
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
