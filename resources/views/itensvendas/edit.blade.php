<x-layouts.app>
    <div class="p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Editar Item de Venda</h1>

        <form action="{{ route('itensvendas.update', $itensvenda->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="venda_id" class="block font-medium mb-1">Venda</label>
                <select name="venda_id" id="venda_id" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
                    @foreach ($vendas as $venda)
                        <option value="{{ $venda->id }}" {{ $venda->id == $itensvenda->venda_id ? 'selected' : '' }}>
                            {{ $venda->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="produto_id" class="block font-medium mb-1">Produto</label>
                <select name="produto_id" id="produto_id" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}" {{ $produto->id == $itensvenda->produto_id ? 'selected' : '' }}>
                            {{ $produto->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="quantidade" class="block font-medium mb-1">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" value="{{ $itensvenda->quantidade }}" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
            </div>

            <div>
                <label for="valor_unitario" class="block font-medium mb-1">Valor Unitário</label>
                <input type="number" name="valor_unitario" id="valor_unitario" step="0.01" value="{{ $itensvenda->valor_unitario }}" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
            </div>

            <div>
                <label for="subtotal" class="block font-medium mb-1">Subtotal</label>
                <input type="number" name="subtotal" id="subtotal" step="0.01" value="{{ $itensvenda->subtotal }}" class="w-full border-gray-300 rounded p-2 dark:bg-zinc-800" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('itensvendas.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                    Voltar
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
