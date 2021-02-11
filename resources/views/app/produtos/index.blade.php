@extends('app.layouts.basic')

@section('titulo', 'Produtos')

@section('conteudo')

<div class="conteudo-pagina">
            <div class="titulo-pagina">
        <h1>Listar produtos</h1>
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
            <table border='1'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->peso }}</td>
                        <td>{{ $produto->unidade_id }}</td>
                        <td>
                        <form method="put" action="">
                            <input type="hidden" name="id" value="">
                            <button type="submit">Alterar</button>
                        </form>
                        </td>
                        <td>
                        <form method="delete" action="">
                            <input type="hidden" name="id" value="">
                            <button type="submit">Excluir</button>
                        </form>   
                        </td>     
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$produtos->appends($request)->links()}}
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