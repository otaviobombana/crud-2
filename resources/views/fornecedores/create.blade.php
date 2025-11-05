<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Novo Fornecedor</h1>

        <form action="{{ route('fornecedores.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nome" class="block font-semibold">Nome</label>
                <input type="text" name="nome" id="nome" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label for="telefone" class="block font-semibold">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                Salvar
            </button>

            <a href="{{ route('fornecedores.index') }}" class="text-gray-600 hover:underline ml-3">Voltar</a>
        </form>
    </div>
</x-layouts.app>
