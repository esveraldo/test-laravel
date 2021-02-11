@extends('app.layouts.basic')

@section('titulo', 'Fornecedores')

@section('conteudo')

<div class="conteudo-pagina">
            <div class="titulo-pagina">
        <h1>Fornecedores - Lista</h1>
    </div>
    
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedores') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
                <table style="width: 100%;" border='1'>
                <thead>
                    <th>Nome</th>
                    <th>Site</th>
                    <th>Uf</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                    <tr>
                        <td>{{$fornecedor->nome}}</td>
                        <td>{{$fornecedor->site}}</td>
                        <td>{{$fornecedor->uf}}</td>
                        <td>{{$fornecedor->email}}</td>
                        <td><a href=" {{ route('app.fornecedores.editar', $fornecedor->id) }}">Editar</a></td>
                    <td><a href="{{ route('app.fornecedores.excluir', $fornecedor->id) }}">Excluir</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$fornecedores->appends($request)->links()}}
            <br>
            {{ $fornecedores->count() }} - Total de regitros por página.
            <br>
            {{ $fornecedores->total() }} - Total de registros da consulta.
            <br>
            {{ $fornecedores->firstItem() }} - Número do primeiro registro da página.
            <br>
            {{ $fornecedores->lastItem() }} - Número do último registro da página.
            <br>
            Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }}( de {{ $fornecedores->firstItem() }} à {{ $fornecedores->lastItem() }})
        </div>
    </div>  
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="{{ asset("img/facebook.png") }}">
        <img src="{{ asset("img/linkedin.png") }}">
        <img src="{{ asset("img/youtube.png") }}>
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>supergestao@dominio.com.br</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="{{ asset("img/mapa.png") }}">
    </div>
</div>

@endsection