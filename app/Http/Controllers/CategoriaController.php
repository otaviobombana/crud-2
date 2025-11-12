<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Listar categorias e passar para view
    public function index()
    {
        // $categorias = Categoria::all();

        $categorias = Categoria::orderBy('descricao')
        ->paginate(2)              
        ->withQueryString();

        return view('categorias.index', compact('categorias'));

    }

    // Formulário para criar nova categoria
    public function create()
    {
        return view('categorias.create');
    }

    // Salvar nova categoria com validação
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|max:100',
        ]);

        Categoria::create([
            'descricao' => $request->descricao
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Mostrar detalhes de uma categoria
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    // Formulário para editar categoria
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Atualizar categoria com validação
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'descricao' => 'required|max:100',
        ]);

        $categoria->update([
            'descricao' => $request->descricao
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Excluir categoria
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}

