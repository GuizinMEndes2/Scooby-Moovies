<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <h1>Scooby-Mooves</h1>

    @if (Auth::user())
<div style="display: inline-block;">
{{ Auth::user()->name }} <br>

@if (Auth::user() && Auth::user()->isAdm)
<a href="">Lista de Filmes</a> <br>
@endif

<a href="{{ route('logout') }}">Logout</a>
</div>

@else
<a href="{{ route('login') }}">Logue-se Aqui</a>
@endif

    <hr>

    @yield('content')
</body>
</html>
