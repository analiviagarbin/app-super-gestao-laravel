<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    //return view('welcome'); Visualização padrão
    return 'Olá! Seja bem-vindo!';
});
*/

//Incorpora uma controller para executar a regra de negócio         //nomear rotas
Route::get('/','App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos','App\Http\Controllers\SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato','App\Http\Controllers\ContatoController@contato')->name('site.contato');

Route::get('/login', function(){
    return 'Login';
})->name('site.login');

//Grupo de prefixo /app
Route::prefix('/app')->group(function(){

    Route::get('/clientes', function(){
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', function(){
        return 'Fornecedores';
    })->name('app.fornecedores');

    Route::get('/produtos', function(){
        return 'Produtos';
    })->name('app.produtos');

});

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

//redirecionamento de rota
//Route::redirect('/rota2', '/rota1');
Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
    //cai na rota2 e vai para a rota1
    echo 'Rota 2';
})->name('site.rota2');

//Se uma rota inexistente ser acessada, redirecionar para outra (fallback)
Route::fallback(function(){
    echo 'A rota acessada não existe! <a href="'.route("site.index").'">Clique aqui</a> para ir para a página inicial.';
});

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