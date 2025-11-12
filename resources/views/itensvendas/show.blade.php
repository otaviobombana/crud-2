<x-layouts.app>
    <div class="p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Item de Venda</h1>

        <div class="bg-white dark:bg-zinc-900 p-4 rounded-lg shadow border dark:border-zinc-700">
            <p><strong>ID:</strong> {{ $itensvenda->id }}</p>
            <p><strong>Venda:</strong> {{ $itensvenda->venda->id ?? '—' }}</p>
            <p><strong>Produto:</strong> {{ $itensvenda->produto->descricao ?? '—' }}</p>
            <p><strong>Quantidade:</strong> {{ $itensvenda->quantidade }}</p>
            <p><strong>Valor Unitário:</strong> R$ {{ number_format($itensvenda->valor_unitario, 2, ',', '.') }}</p>
            <p><strong>Subtotal:</strong> R$ {{ number_format($itensvenda->subtotal, 2, ',', '.') }}</p>
        </div>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('itensvendas.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                Voltar
            </a>
        </div>
    </div>
</x-layouts.app>
