<?php

namespace App\Http\Controllers;

use App\Models\ItemVenda;
use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Http\Request;

class ItemVendaController extends Controller
{
    public function index()
    {
        $itens = ItemVenda::with(['venda', 'produto'])
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('itensvendas.index', compact('itens'));
    }

    public function create()
    {
        $vendas = Venda::all();
        $produtos = Produto::all();
        return view('itensvendas.create', compact('vendas', 'produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venda_id' => 'required|exists:vendas,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $subtotal = $request->quantidade * $request->valor_unitario;

        ItemVenda::create([
            'venda_id' => $request->venda_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'valor_unitario' => $request->valor_unitario,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('itensvendas.index')->with('success', 'Item de venda criado com sucesso!');
    }

    public function show(ItemVenda $itensvenda)
    {
        return view('itensvendas.show', compact('itensvenda'));
    }

    public function edit(ItemVenda $itensvenda)
    {
        $vendas = Venda::all();
        $produtos = Produto::all();
        return view('itensvendas.edit', compact('itensvenda', 'vendas', 'produtos'));
    }

    public function update(Request $request, ItemVenda $itensvenda)
    {
        $request->validate([
            'venda_id' => 'required|exists:vendas,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $subtotal = $request->quantidade * $request->valor_unitario;

        $itensvenda->update([
            'venda_id' => $request->venda_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'valor_unitario' => $request->valor_unitario,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('itensvendas.index')->with('success', 'Item de venda atualizado com sucesso!');
    }

    public function destroy(ItemVenda $itensvenda)
    {
        $itensvenda->delete();
        return redirect()->route('itensvendas.index')->with('success', 'Item de venda excluído com sucesso!');
    }
}
