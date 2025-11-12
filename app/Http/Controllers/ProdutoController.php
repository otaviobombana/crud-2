<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with(['categoria', 'fornecedor'])
        ->orderBy('descricao')
        ->paginate(2) // Mostra 10 produtos por página
        ->withQueryString(); // Mantém filtros e busca, se existirem

       return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();
        return view('produtos.create', compact('categorias', 'fornecedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:150',
            'preco' => 'required|numeric|min:0',
            'id_categoria' => 'nullable|exists:categorias,id',
            'id_fornecedor' => 'nullable|exists:fornecedores,id',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();
        return view('produtos.edit', compact('produto', 'categorias', 'fornecedores'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'descricao' => 'required|string|max:150',
            'preco' => 'required|numeric|min:0',
            'id_categoria' => 'nullable|exists:categorias,id',
            'id_fornecedor' => 'nullable|exists:fornecedores,id',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
