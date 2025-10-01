<x-layouts.app>
     <link rel="stylesheet" href="{{ asset('app.css') }}">
    <div class="container">
        <h1>Categoria #{{ $categoria->id_categoria }}</h1>
        <p><strong>Descrição:</strong> {{ $categoria->descricao }}</p>

        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</x-layouts.app>
