<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Nova Venda</h1>

        <a href="{{ route('vendas.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">
            ← Voltar para Lista
        </a>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vendas.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Cliente</label>
                <select name="clientes_id" class="border p-2 rounded w-full">
                    <option value="">Selecione um cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('clientes_id') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Data da Venda</label>
                <input type="datetime-local" name="data" value="{{ old('data', now()->format('Y-m-d\TH:i')) }}" class="border p-2 rounded w-full">
            </div>

            <div>
                <label class="block mb-1 font-medium">Valor Total</label>
                <input type="number" step="0.01" name="valortotal" value="{{ old('valortotal') }}" class="border p-2 rounded w-full">
            </div>

            <div>
                <label class="block mb-1 font-medium">Forma de Pagamento</label>
                <input type="text" name="formapgto" value="{{ old('formapgto') }}" class="border p-2 rounded w-full">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Criar Venda
            </button>
        </form>
    </div>
</x-layouts.app>
