<?php

use Illuminate\Support\Facades\Route;

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
    
    // produtos
    Route::resource('/produto', 'App\Http\Controllers\ProdutoController');
    Route::resource('/produto-detalhe', 'App\Http\Controllers\ProdutoDetalheController');

    Route::resource('/cliente', 'App\Http\Controllers\ClienteController');
    Route::resource('/pedido', 'App\Http\Controllers\PedidoController');
    //Route::resource('/pedido-produto', 'App\Http\Controllers\PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'App\Http\Controllers\PedidoProdutoController@create')->name('pedido_produto.create');
    Route::post('pedido-produto/create/{pedido}', 'App\Http\Controllers\PedidoProdutoController@store')->name('pedido_produto.store');
    Route::delete('pedido-produto/destroy/{pedido}/{produto}', 'App\Http\Controllers\PedidoProdutoController@destroy')->name('pedido-produto.destroy');
 
    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'App\Http\Controllers\FornecedorController@excluir')->name('app.fornecedor.excluir');
});

//Se uma rota inexistente ser acessada, redirecionar para outra (fallback)
Route::fallback(function(){
    echo 'A rota acessada não existe! <a href="'.route("site.index").'">Clique aqui</a> para ir para a página inicial.';
});

/*
verbos http

get
post
put
patch
delete
options
*/