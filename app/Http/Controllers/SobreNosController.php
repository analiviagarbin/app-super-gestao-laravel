<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    public function sobrenos(){
        return view('site.sobre-nos', ['titulo' => 'Sobre Nós']);
    }
}
