<x-layouts.app :title="__('Minhas Categorias')">
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
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
                                         onclick="return confirm('Tem certeza que deseja excluir a categoria {{ $categoria->descricao }}?')">
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
</x-layouts.app>
