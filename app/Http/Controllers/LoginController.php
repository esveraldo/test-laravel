<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $error = '';
        
        if($request->get('error') == 1){
            $error = 'Usuário ou senha inválidos';
        }
        
        if($request->get('error') == 2){
            $error = 'Necessário ter login para acessar a página.';
        }
        
        return view('site.login.index', ['error' => $error]);
    }
    
    public function autenticar(Request $request)
    {
        //Validações
        $request->validate([
            'usuario' => 'required|email',
            'senha'   => 'required'
            ],
            [
            'usuario.required' => 'O campo usuário é requirido.',
            'usuario.email' => 'Use um email válido.',
            'senha.required' => 'O campo senha é requerido'
            ]
                
        );
        
        //Recuperando os parametros
        $email = $request->get('usuario');
        $password = $request->get('senha');
        
        $user = new User();
        
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        
//        echo '<pre>';
//        print_r($usuario);
//        echo '</pre>';
        
//        echo '<pre>';
//        echo $usuario->name . ' - ' . $usuario->email . ' - ' . $usuario->password;
//        echo '</pre>';
        
        if(isset($usuario->name) && isset($usuario->password)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login', ['error' => 1]);
        }
    }
    
    public function sair()
    {
        session_destroy();
        
        return redirect()->route('site.index');
    }
}
