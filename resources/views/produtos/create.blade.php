<x-layouts.app>
    <div class="p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Novo Produto</h1>

        <a href="{{ route('produtos.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">← Voltar</a>

        <form action="{{ route('produtos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Descrição</label>
                <input type="text" name="descricao" class="border p-2 rounded w-full" value="{{ old('descricao') }}" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Preço</label>
                <input type="number" step="0.01" name="preco" class="border p-2 rounded w-full" value="{{ old('preco') }}" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Categoria</label>
                <select name="id_categoria" class="border p-2 rounded w-full">
                    <option value="">Selecione</option>
                    @foreach ($categorias as $c)
                        <option value="{{ $c->id }}" {{ old('id_categoria') == $c->id ? 'selected' : '' }}>{{ $c->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Fornecedor</label>
                <select name="id_fornecedor" class="border p-2 rounded w-full">
                    <option value="">Selecione</option>
                    @foreach ($fornecedores as $f)
                        <option value="{{ $f->id }}" {{ old('id_fornecedor') == $f->id ? 'selected' : '' }}>{{ $f->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
        </form>
    </div>
</x-layouts.app>
