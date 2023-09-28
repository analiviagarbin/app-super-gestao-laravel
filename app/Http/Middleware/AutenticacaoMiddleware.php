<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        session_start();

        if(isset($_SESSION['email']) && isset($_SESSION['email']) != ''){
            return $next($request);
        }else {
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
