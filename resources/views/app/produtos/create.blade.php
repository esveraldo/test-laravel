@extends('app.layouts.basic')

@section('titulo', 'Produtos')

@section('conteudo')

<div class="conteudo-pagina">
            <div class="titulo-pagina">
        <h1>Adicionar produtos</h1>
    </div>
    
    <div class="menu">
        <ul>
            <li><a href="{{ route('produtos.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            {{ $msg }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('produtos.store') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    @if($errors->has('nome'))
                        {{ $rrors->first('nome') }}
                    @endif
                    <input type="text" name="peso" value="{{ old('peso') }}" placeholder="Peso" class="borda-preta">
                    @if($errors->has('nome'))
                        {{ $rrors->first('peso') }}
                    @endif
                    <select name="unidade_id" class="borda-preta">
                        <option value="">Qual é aunidade?</option>
                        <option value="1">Peso</option>
                        <option value="2">Metragem</option>
                    </select>
                    <textarea name="descricao" class="borda-preta">
                        @if(old('descricao'))
                            {{ old('descricao') }}
                        @else
                            Descrição
                        @endif
                    </textarea>
                    @if($errors->has('descricao'))
                        {{ $rrors->first('descricao') }}
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

