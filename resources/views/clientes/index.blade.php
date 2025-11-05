<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
    </head>

    <div class="container">
        <h1>Lista de Clientes</h1>

        <div class="form-actions">
            <a href="{{ route('clientes.create') }}" class="btn">+ Novo Cliente</a>
        </div>

        @if (session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <table class="table" id="tabela-clientes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id_cliente }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente) }}" class="btn-show">Ver</a>
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Deseja excluir este cliente?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Nenhum cliente encontrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        // Função para atualizar a numeração dos IDs da tabela dinamicamente
        function atualizarNumeracao() {
            const tabela = document.getElementById('tabela-clientes');
            const linhas = tabela.querySelectorAll('tbody tr');

            linhas.forEach((linha, index) => {
                const celulaId = linha.querySelector('td:first-child');
                if (celulaId) {
                    celulaId.textContent = index + 1;
                }
            });
        }

        // Chama a função assim que a página carregar
        document.addEventListener('DOMContentLoaded', atualizarNumeracao);
    </script>
</x-layouts.app>
