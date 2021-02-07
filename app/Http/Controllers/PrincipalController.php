<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\MotivoContato;

class PrincipalController extends Controller
{
    
    public function principal()
    {
//        $motivo = [
//            '1'=>'Dúvida',
//            '2'=>'Elogio',
//            '3'=>'Reclamação'
//        ];
        
        $motivo = MotivoContato::all();
        
        return view('site.principal.index', ['motivo' => $motivo]);
    }
}
