<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Produto;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);
        
        $msg = '';
        
        //dd($produtos);
        
        return view('app.produtos.index', ['produtos' => $produtos, 'request' => $request->all(), 'msg' => $msg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $msg = '';
        
        return view('app.produtos.create', ['msg' => $msg]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'descricao' => 'required',
            'peso' => 'required',
            'unidade_id' => 'required'
        ];
        
        $mensagens = [
            'required' => 'O :attribute é requerido'
        ];
        
        $request->validate($regras, $mensagens);
        
        $produto = Produto::create($request->all());
        
        $produtos = Produto::paginate(10);
        
        $msg = '';
        
        if($produto){
            $msg = 'Cadastro criado com sucesso!';
            return view('app.produtos.index', ['produtos' => $produtos, 'request' => $request->all(), 'msg' => $msg]);
        }else{
            $msg = 'Erro ao tentar incluir o cadastro';
            return view('app.produtos.create', ['msg' => $msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
