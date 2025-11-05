<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('app.css') }}">
    </head>

    <div class="container">
        <h1>Detalhes do Cliente</h1>

        <div class="details">
            <p><strong>ID:</strong> {{ $cliente->id_cliente }}</p>
            <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
            <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
            <p><strong>Telefone:</strong> {{ $cliente->telefone ?? 'Não informado' }}</p>
           
        </div>

        <div class="form-actions">
            <a href="{{ route('clientes.edit', $cliente) }}" class="btn-edit">Editar</a>
            <a href="{{ route('clientes.index') }}" class="btn-secondary">Voltar</a>
        </div>
    </div>
</x-layouts.app>
