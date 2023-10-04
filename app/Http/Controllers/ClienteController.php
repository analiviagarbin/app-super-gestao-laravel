<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);
        return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    public function create()
    {
        return view('app.cliente.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:50'
        ];

        $feedback = [
            'required' => 'O nome deve ser preenchido',
            'min' => 'O nome deve ter no mínimo 3 caracteres',
            'max' => 'O nome deve ter no máximo 50 caracteres'
        ];

        $request->validate($regras, $feedback);

        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
