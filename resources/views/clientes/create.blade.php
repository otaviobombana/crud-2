<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
    </head>

    <div class="container">
        <h1>Novo Cliente</h1>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
                @error('nome')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
  <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required>
                @error('cpf')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
         
        

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}">
                @error('telefone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

        
            <div class="form-actions">
                <button type="submit" class="btn">Criar Cliente</button>
                <a href="{{ route('clientes.index') }}" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
