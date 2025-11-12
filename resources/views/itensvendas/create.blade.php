<x-layouts.app>
    <div class="p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Novo Item de Venda</h1>

        <form action="{{ route('itensvendas.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="venda_id" class="block font-medium mb-1">Venda</label>
                <select name="venda_id" id="venda_id" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
                    <option value="">Selecione...</option>
                    @foreach ($vendas as $venda)
                        <option value="{{ $venda->id }}">{{ $venda->id }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="produto_id" class="block font-medium mb-1">Produto</label>
                <select name="produto_id" id="produto_id" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
                    <option value="">Selecione...</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="quantidade" class="block font-medium mb-1">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" min="1" required>
            </div>

            <div>
                <label for="valor_unitario" class="block font-medium mb-1">Valor Unitário</label>
                <input type="number" name="valor_unitario" id="valor_unitario" step="0.01" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
            </div>

            <div>
                <label for="subtotal" class="block font-medium mb-1">Subtotal</label>
                <input type="number" name="subtotal" id="subtotal" step="0.01" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('itensvendas.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                    Cancelar
                </a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
