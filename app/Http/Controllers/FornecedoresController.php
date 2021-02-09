<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Fornecedor;

class FornecedoresController extends Controller
{
    
    public function fornecedores()
    {
        return view('app.fornecedores.index');
    }
    
    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
                ->where('site', 'like', '%'.$request->input('site').'%')
                ->where('uf', 'like', '%'.$request->input('uf').'%')
                ->where('email', 'like', '%'.$request->input('email').'%')
                ->paginate(2);
        return view('app.fornecedores.read', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
    
    public function adicionar()
    {
        return view('app.fornecedores.create');
    }
    
     public function salvar(Request $request)
    {
        $validate = [
            'nome'  => 'required|min:3',
            'site'  => 'required',
            'uf'    => 'required',
            'email' => 'required|email'
        ];
        $msg = [
            'nome.required'  => 'O campo nome é requerido.',
            'site.required'           => 'O campo site é requerido.',
            'uf.required'             => 'O campo uf é requerido.',
            'email.required' => 'O campo email é requerido.',
            'email.email'    => 'Digite um email válido.',
        ];

        $request->validate($validate, $msg);

        if(Fornecedor::create($request->all())){
            $mensagem = 'Cadastro realizado com sucesso!';
        }else{
            $mensagem = '';
        }
        
        return view('app.fornecedores.create', ['mensagem' => $mensagem]);
    }
    
    public function editar($id)
    {
        $fornecedor = Fornecedor::find($id);
        
        //dd($fornecedor);
        
        return view('app.fornecedores.update', ['fornecedor' => $fornecedor]);
    }
    
    public function alterar(Request $request)
    {
        $validate = [
            'nome'  => 'required|min:3',
            'site'  => 'required',
            'uf'    => 'required',
            'email' => 'required|email'
        ];
        $msg = [
            'nome.required'  => 'O campo nome é requerido.',
            'site.required'           => 'O campo site é requerido.',
            'uf.required'             => 'O campo uf é requerido.',
            'email.required' => 'O campo email é requerido.',
            'email.email'    => 'Digite um email válido.',
        ];

        $request->validate($validate, $msg);
        
        $fornecedor = Fornecedor::find($request->input('id'));
        if($fornecedor->update($request->all())){
            $mensagem = 'Cadastro atualizado com sucesso!';
        }else{
            $mensagem = '';
        }
        
        $fornecedor->update($request->all());
        
        return view('app.fornecedores.update', ['fornecedor' => $fornecedor, 'mensagem' => $mensagem]);
    }
}
