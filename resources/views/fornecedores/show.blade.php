<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Fornecedor</h1>

        <p><strong>ID:</strong> {{ $fornecedor->id }}</p>
        <p><strong>Nome:</strong> {{ $fornecedor->nome }}</p>
        <p><strong>Telefone:</strong> {{ $fornecedor->telefone }}</p>

        <a href="{{ route('fornecedores.index') }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Voltar
        </a>
    </div>
</x-layouts.app>
