<x-layouts.app :title="__('Minhas Categorias')">
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <div class="container">
        <div class="header">
            <h1>Minhas Categorias</h1>
            <a href="{{ route('categorias.create') }}" class="btn">+ Nova Categoria</a>
        </div>

        @if ($categorias->isEmpty())
            <p>Nenhuma categoria cadastrada.</p>
        @else
            <table class="table" id="categorias-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $categoria->descricao }}</td>
                            <td>
                                <a href="{{ route('categorias.show', $categoria) }}" class="link blue">Ver</a>
                                <a href="{{ route('categorias.edit', $categoria) }}" class="link yellow">Editar</a>
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn-excluir link red"
                                            data-nome="{{ $categoria->descricao }}">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        
        @endif
    </div>

    <script>
        const tabela = document.querySelector('#categorias-table tbody');

        // Atualiza a numeração dos IDs da tabela
        function atualizarNumeracao() {
            const linhas = tabela.querySelectorAll('tr');
            linhas.forEach((linha, index) => {
                linha.querySelector('td:first-child').textContent = index + 1;
            });
        }

        // Configuração do SweetAlert para confirmar exclusão
        document.querySelectorAll('.btn-excluir').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const form = this.closest('form');
                const nome = this.dataset.nome;

                Swal.fire({
                    title: `Tem certeza que deseja excluir "${nome}"?`,
                    text: "Você não poderá reverter isso!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, excluir!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Excluído!',
                            `"${nome}" foi excluído com sucesso.`,
                            'success'
                        ).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });

        // Exemplo de adicionar categoria dinamicamente (apenas para demonstração)
        document.getElementById('btn-add').addEventListener('click', () => {
            const descricao = prompt('Digite a descrição da nova categoria:');
            if (!descricao) return;

            const novaLinha = document.createElement('tr');
            novaLinha.innerHTML = `
                <td></td>
                <td>${descricao}</td>
                <td>
                    <a href="#" class="link blue">Ver</a>
                    <a href="#" class="link yellow">Editar</a>
                    <form method="POST" class="inline">
                        <button type="button" class="btn-excluir link red" data-nome="${descricao}">Excluir</button>
                    </form>
                </td>
            `;

            tabela.appendChild(novaLinha);

            // Atualiza numeração após adicionar
            atualizarNumeracao();

            // Reaplica o evento do SweetAlert para o novo botão excluir
            novaLinha.querySelector('.btn-excluir').addEventListener('click', function(event) {
                event.preventDefault();

                const form = this.closest('form');
                const nome = this.dataset.nome;

                Swal.fire({
                    title: `Tem certeza que deseja excluir "${nome}"?`,
                    text: "Você não poderá reverter isso!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, excluir!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Excluído!',
                            `"${nome}" foi excluído com sucesso.`,
                            'success'
                        ).then(() => {
                            // Remove a linha da tabela (já que não tem backend aqui)
                            novaLinha.remove();
                            atualizarNumeracao();
                        });
                    }
                });
            });
        });
    </script>
</x-layouts.app>
