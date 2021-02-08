<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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
Route::get('/login/{error?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login.');

//autenticacao é um middleware registrado no Kernel.php
Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/clientes', 'ClientesController@clientes')->name('app.clientes');
    Route::get('/fornecedores', 'FornecedoresController@fornecedores')->name('app.fornecedores');
    Route::get('/produtos', 'ProdutosController@produtos')->name('app.produtos');
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

 