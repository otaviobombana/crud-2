<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
    </head>
    <div class="container">
        <h1>Nova Categoria</h1>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input
                    type="text"
                    name="descricao"
                    id="descricao"
                    value="{{ old('descricao') }}"
                    placeholder="Ex: Eletrônicos, Roupas, etc."
                    required
                >
                @error('descricao')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Criar Categoria</button>
            </div>
        </form>
    </div>
</x-layouts.app>
