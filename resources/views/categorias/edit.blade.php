<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Categoria</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input
                    type="text"
                    name="descricao"
                    id="descricao"
                    value="{{ old('descricao', $categoria->descricao) }}"
                    placeholder="Ex: Eletrônicos, Roupas, etc."
                    required
                >
                @error('descricao')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar Categoria</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
