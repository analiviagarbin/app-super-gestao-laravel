<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

//Incorpora uma controller para executar a regra de negócio         //nomear rotas
Route::get('/','App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos','App\Http\Controllers\SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class,'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'autenticar'])->name('site.login');

//Grupo de prefixo /app
Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'App\Http\Controllers\HomeController@index' )->name('app.home');
    Route::get('/sair', 'App\Http\Controllers\LoginController@sair' )->name('app.sair');
    Route::get('/cliente', 'App\Http\Controllers\ClienteController@index' )->name('app.cliente');
    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'App\Http\Controllers\ProdutoController@index' )->name('app.produto');
});

//Se uma rota inexistente ser acessada, redirecionar para outra (fallback)
Route::fallback(function(){
    echo 'A rota acessada não existe! <a href="'.route("site.index").'">Clique aqui</a> para ir para a página inicial.';
});

/* //redirecionamento de rota
//Route::redirect('/rota2', '/rota1');
Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
    //cai na rota2 e vai para a rota1
    echo 'Rota 2';
})->name('site.rota2'); */

//Envio de parametros nas rotas
//Parametros opcionais '?'
//Tratamento de parametros
/* Route::get(
    '/contato/{nome}/{categoria_id}',
            function(
                string $nome = 'Desconhecido', 
                int $categoria_id = 1 // 1 - Informação
             ) {
    //sequencia dos parametros importa
    echo "Estamos aqui $nome - $categoria_id";}
    )
    ->where('nome', '[A-Za-z]+')
    ->where('categoria_id', '[0-9]+'); */

/*
verbos http

get
post
put
patch
delete
options
*/