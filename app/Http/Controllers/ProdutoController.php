<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Unidade;

class ProdutoController extends Controller
{
    // php artisan make:controller --resource ProdutoController --model=Produto

    // listagem em paginação
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all() ]);
    }

    // cria o formulário de inserção
    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto.create', ['unidades' => $unidades]);
    }

    // armazena os dados do create no banco
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute ultrapassou o limite de caracteres',
            'exists' => 'Essa únidade de medida não está disponível',
            'peso.integer' => 'O campo peso deve ser um número inteiro'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    // exibir dados de um registro específico
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    // editar registro
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    // atualização do registro do banco a partir do formulario do edit
    public function update(Request $request, Produto $produto)
    {
        $request->all(); //payload (dados úteis)
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id ]);
    }

    // excluir registros do banco - delete
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect('produto.index');
    }
}
