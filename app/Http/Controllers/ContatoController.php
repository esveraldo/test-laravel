<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SiteContato;

class ContatoController extends Controller
{
    public function index()
    {
        
        $motivo = [
            '1'=>'Dúvida',
            '2'=>'Elogio',
            '3'=>'Reclamação'
        ];
       
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
            'email'    => 'required',
            'motivo'   => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        
        //SiteContato::create($request->all());

    }
}
