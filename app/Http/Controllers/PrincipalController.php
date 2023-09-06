<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        //echo 'Olá! Seja bem-vindo!';
        return view('site.principal', ['titulo' => 'Principal']);
    }
}
