<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){     //nome do lado da view
        return view('site.contato', ['titulo' => 'Contato']);
    }
}
