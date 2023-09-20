<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){ 

        /* MOSTRAR AS INFORMAÇÕES DO FORM NA TELA
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        echo '<br>';
        */

        // /*Envia os valores para o banco de dados*/
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // if($_SERVER["REQUEST_METHOD"] == "POST"){
        //     $contato->save();
        // }

        // $contato->fill($request->all());

        // print_r($contato->getAttributes());

        // if($_SERVER["REQUEST_METHOD"] == "POST"){
        //     $contato->save();
        // }
        
        // if($_SERVER["REQUEST_METHOD"] == "POST"){
        //     $contato->create($request->all());
        // }    

        return view('site.contato', ['titulo' => 'Contato']);
    }

    public function salvar(Request $request){
        
        // validação dos dados do formulário
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        //SiteContato::create($request->all());
    }
}
