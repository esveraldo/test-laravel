@extends('app.layouts.basic')

@section('titulo', 'Fornecedores')

@section('conteudo')

<div class="conteudo-pagina">
            <div class="titulo-pagina">
        <h1>Fornecedores - Adicionar</h1>
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
                @if(isset($mensagem) && !empty($mensagem))
                    {{ $mensagem }}
                @endif
                <form method="post" action="{{ route('app.fornecedores.salvar') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" class="borda-preta" placeholder="Nome">
                    @if($errors->has('nome'))
                        {{ $errors->first('nome') }}
                    @endif
                    <input type="text" name="site" value="{{ old('site') }}" class="borda-preta" placeholder="Site">
                    @if($errors->has('site'))
                        {{ $errors->first('site') }}
                    @endif        
                    <input type="text" name="uf" value="{{ old('uf') }}" class="borda-preta" placeholder="Uf">
                    @if($errors->has('uf'))
                        {{ $errors->first('uf') }}
                    @endif
                    <input type="text" name="email" value="{{ old('email') }}" class="borda-preta" placeholder="Email">
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                    <button type="submit" class="borda-preta">Cadastrar</button>
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