<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome pode ter no máximo 40 caracteres',
            'nome.unique' => 'Esse nome já existe',
            'email' => 'O e-mail é inválido',
            'motivo_contatos_id.required' => 'Selecione um motivo para contato',
            'mensagem.max' => 'O campo mensagem pode ter no máximo 2000 caracteres'
        ];
        
        //realizar a validação dos dados do formulário recebidos no request
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}