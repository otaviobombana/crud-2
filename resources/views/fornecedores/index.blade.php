<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Lista de Fornecedores</h1>

        <a href="{{ route('fornecedores.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            Novo Fornecedor
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
                    <th class="px-4 py-2 border-b">Nome</th>
                    <th class="px-4 py-2 border-b">Telefone</th>
                    <th class="px-4 py-2 border-b text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-800">
                        <td class="px-4 py-2 border-b">{{ $fornecedor->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $fornecedor->nome }}</td>
                        <td class="px-4 py-2 border-b">{{ $fornecedor->telefone }}</td>
                        <td class="px-4 py-2 border-b text-center space-x-2">
                            <a href="{{ route('fornecedores.show', $fornecedor->id) }}"
                               class="text-blue-500 hover:underline">Ver</a>
                            <a href="{{ route('fornecedores.edit', $fornecedor->id) }}"
                               class="text-yellow-500 hover:underline">Editar</a>
                            <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Deseja realmente excluir este fornecedor?')"
                                        class="text-red-500 hover:underline">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         @if ($fornecedores->hasPages())
    <div class="pagination">
        <div class="pagination-info">
            {{ $fornecedores->firstItem() }}–{{ $fornecedores->lastItem() }}
            de {{ $fornecedores->total() }}
        </div>

        <div class="pagination-links">
            {{ $fornecedores->links() }}
        </div>
    </div>
@endif
    </div>
</x-layouts.app>
