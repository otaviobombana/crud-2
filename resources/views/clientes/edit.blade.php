<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
    </head>

    <div class="container">
        <h1>Editar Cliente</h1>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $cliente->nome) }}" required>
                @error('nome')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $cliente->cpf) }}" required>
                @error('cpf')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
           

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $cliente->telefone) }}">
                @error('telefone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

          

            <div class="form-actions">
                <button type="submit" class="btn">Salvar Alterações</button>
                <a href="{{ route('clientes.index') }}" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
