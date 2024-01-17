<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PrincipalController@principal')
    ->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@principal')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@principal')->name('site.contato');
    
Route::post('/contato', 'ContatoController@salvar')->name('site.contato.salvar');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login'); 
Route::post('/login', 'LoginController@autenticar')->name('site.login'); 

//#### ROTA APP
Route::middleware('autenticacao')->prefix('/app')->group(function() {
    
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    //### CLIENTE
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    //### FORNECEDOR
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor'); 
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar'); 
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');  
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar'); 
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');  
    
    
    //### PRODUTO
    Route::resource('/produto', 'ProdutoController');

    //### PRODUTOS DETALHES
    Route::resource('/produto-detalhe', 'ProdutoDetalheController');

});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para página inicial';
});
