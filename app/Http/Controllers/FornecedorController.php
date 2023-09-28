<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::
            where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(2);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all() ]);
    }

    public function editar($id, $msg = ''){

        $fornecedor = Fornecedor::find($id);
        $msg = 'Fornecedor alterado com sucesso!';
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);

    }

    public function adicionar(Request $request){

        $msg = '';

        // inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            //cadastro
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O pode deve ter no máximo 40 caracteres',
                'uf.min' => 'A UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'A UF pode ter no máximo 2 caracteres',
                'email' => 'E-mail inválido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor;
            $fornecedor->create($request->all());

            // dados view
            $msg = 'Cadastro realizado com sucesso!';
        }

        // edição
        if($request->input('_token') != '' && $request->input('id') != ''){

            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Fornecedor atualizado com sucesso!';
            } else{
                $msg = 'Não foi possível atualizar fornecedor';
            }

            return redirect()->route('app.fornecedor.editar', ['id'=>$request->input('id'), 'msg' => $msg]);
            
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function excluir($id){
        
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}