<x-layouts.app :title="__('Minhas Categorias')">
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluindo SweetAlert2 -->
    </head>

    <div class="container">
        <div class="header">
            <h1>Minhas Categorias</h1>
            <a href="{{ route('categorias.create') }}" class="btn">+ Nova Categoria</a>
        </div>

        @if ($categorias->isEmpty())
            <p>Nenhuma categoria cadastrada.</p>
        @else
            <table class="table">
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
                            <td>{{ $categoria->id_categoria }}</td>
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
        document.querySelectorAll('.btn-excluir').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Evita o submit imediato
                
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
    </script>
</x-layouts.app>
