<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PrincipalController@principal')
    ->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@principal')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@principal')->name('site.contato');
    
Route::post('/contato', 'ContatoController@salvar')->name('site.contato.salvar');

Route::get('/login', function() {
    return "Login";
})->name('site.login'); 


Route::prefix('/app')->group(function() {
    
    Route::get('/clientes', function() {
        return "Cliente";
    })->name('app.clientes');
    
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    
    Route::get('/produtos', function() {
        return "Produtos";
    })->name('app.produtos');

});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para página inicial';
});
