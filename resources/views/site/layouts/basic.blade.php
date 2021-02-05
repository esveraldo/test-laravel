<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        
        @include('site.layouts.partials.topo')
        @yield('conteudo')
        
    </body>
</html>
