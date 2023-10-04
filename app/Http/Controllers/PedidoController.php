<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);
        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    public function create()
    {
        $clientes = Cliente::all();

        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    public function store(Request $request)
    {
        $regras = [
            'cliente_id' => 'exists:clientes,id'
        ];
        $feedback = [
            'cliente_id.exists' => 'Cliente inválido'
        ];

        $request->validate($regras, $feedback);

        $pedido = new Pedido();
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();
        
        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
