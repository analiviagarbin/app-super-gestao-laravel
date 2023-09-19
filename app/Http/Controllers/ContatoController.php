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

        /*Envia os valores para o banco de dados*/
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $contato->save();
        }
        
        return view('site.contato', ['titulo' => 'Contato']);
    }
}
