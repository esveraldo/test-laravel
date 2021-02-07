<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SiteContato;
use App\Model\MotivoContato;

class ContatoController extends Controller
{
    public function index()
    {
        
//        $motivo = [
//            '1'=>'Dúvida',
//            '2'=>'Elogio',
//            '3'=>'Reclamação'
//        ];
        
        $motivo = MotivoContato::all();
        
        //dd($motivo);
       
        return view('site.contato.index', ['motivo' => $motivo]);
    }
    
    public function salvar(Request $request)
    {
        //        $contato = new SiteContato();
//        $contato->fill($request->all());
//        $contato->save();
        
//        dd($request);
        
//        dd($request->input('motivo'));
        
//        $contato->nome = $request->input('nome');
//        $contato->telefone = $request->input('telefone');
//        $contato->email = $request->input('email');
//        $contato->motivo = $request->input('motivo');
//        $contato->mensagem = $request->input('mensagem');
//        $contato->save();
        
//        $contato->create($request->all());
        
        $request->validate([
            'nome'     => 'required|min:3|max:100',
            'telefone' => 'required',
            'email'    => 'email|unique:site_contatos',
            'motivo_contato_id'   => 'required',
            'mensagem' => 'required|max:2000'
        ],
        [
            "nome.required" => 'O campo nome é requerido.',
            "nome.min" => 'O campo nome deve ter no minimo 3 caracteres.',
            "nome.max" => 'O campo nome deve ter no máximo 100 caracteres.',
            "telefone.required" => 'O campo telefone é requerido.',
            "email.required" => 'O campo email é requerido.',
            "email.email" => 'O email deve ser válido.',
            "email.unique" => 'O email já está em uso.',
            "motivo_contato_id.required" => 'O campo motivo é requerido.',
            "mensagem.required" => 'O campo mensagem é requerido.',
            "mensagem.max" => 'O campo mensagem permite no máximo 2000 caracteres.',
            
            'required' => 'O campo :attribute deve ser preenchido'
            
        ]
        );
        
        SiteContato::create($request->all());
        
        return redirect()->route('site.index');

    }
}
