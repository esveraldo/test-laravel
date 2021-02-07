<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobre')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@index')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login', function(){ return 'Login'; });

Route::prefix('/app')->group(function(){
    Route::get('/clientes', 'ClientesController@clientes');
    Route::get('/fornecedores', 'FornecedoresController@fornecedores');
    Route::get('/produtos', 'ProdutosController@produtos');
});

//Teste

Route::get('/rota1', function(){
    return redirect()->route('site.rota2');
})->name('site.rota1');


Route::get('/rota2', function(){
    return 'Rota2';
})->name('site.rota2');
/*
Route::redirect('/rota2', 'rota1');
 * */

Route::fallback(function(){
    return 'Página não encontrada, <a href="/">clique aqui</a> para retornar a página inicial.';
});

//Redirecionamento com página nomeada
//Route::fallback(function(){
//    return 'Página não encontrada, <a href="'.route('site.principal').'">clique aqui para retornar a página inicial.</a>';
//});

 