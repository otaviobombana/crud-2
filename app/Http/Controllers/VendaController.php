<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with('cliente')
        ->orderBy('id', 'desc')
        ->paginate(2) 
        ->withQueryString();

    return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('vendas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'clientes_id' => 'required|exists:clientes,id',
            'valortotal' => 'required|numeric',
            'formapgto' => 'required|string|max:50',
        ]);

        Venda::create($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda criada com sucesso!');
    }

    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();
        return view('vendas.edit', compact('venda', 'clientes'));
    }

    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'clientes_id' => 'required|exists:clientes,id',
            'valortotal' => 'required|numeric',
            'formapgto' => 'required|string|max:50',
        ]);

        $venda->update($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!');
    }
}
