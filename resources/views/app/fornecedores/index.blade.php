@extends('app.layouts.basic')

@section('titulo', 'Fornecedores')

@section('conteudo')

<div class="conteudo-pagina">
            <div class="titulo-pagina">
        <h1>Fornecedores</h1>
    </div>
    
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedores') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.fornecedores.listar') }}">
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome">
                    <input type="text" name="site" class="borda-preta" placeholder="Site">
                    <input type="text" name="uf" class="borda-preta" placeholder="Uf">
                    <input type="text" name="email" class="borda-preta" placeholder="Email">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
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