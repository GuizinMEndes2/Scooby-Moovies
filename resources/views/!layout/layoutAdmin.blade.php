<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/teste.css') }}">
</head>
<body>
<a href="{{ route('home') }}">
    <h1>Scooby-Mooves</h1>
</a>
    @if (Auth::user())
<div style="display: inline-block;">
{{ Auth::user()->name }} <br>

@if (Auth::user() && Auth::user()->isAdm)
<a href="{{ route('movie.lista') }}">Lista de Filmes</a> <br>
<a href="{{ route('categoria.list') }}">Lista de Categorias</a> <br>
@endif

<a href="{{ route('logout') }}">Logout</a>
</div>

@else
<a href="{{ route('login') }}">Logue-se Aqui</a>
@endif

    <hr>

    <form class="search-form" action="{{ url()->current() }}" method="POST">
        @csrf
        <input class="search-input" type="text" name="busca" placeholder="Pesquisar...">
        <button class="search-button" type="submit">Buscar</button>
    </form>

    @yield('content')

</body>
</html>
