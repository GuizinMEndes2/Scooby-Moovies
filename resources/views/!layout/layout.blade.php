<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}" class="navbar-logo">
            <h1>Scooby-Mooves</h1>
        </a>

     <form action="{{ url('/') }}" method="POST" class="search-form">
            @csrf
            <div class="input-group">
                <input type="text" name="busca" placeholder="Buscar Filme">
                <select name="ano">
            <option value="">Selecione o Ano</option>
            @php
                $currentYear = date('Y');
                $startYear = 1900;
            @endphp

            @for ($year = $currentYear; $year >= $startYear; $year--)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
            </select>
                <select name="categoria_id">
            <option value="">Selecione a Categoria</option>
            @foreach ($categoriaSearch as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
            </select>
                <button type="submit">Buscar</button>
            </div>
        </form>


        @if (Auth::user())
        <div class="admin-links">
            {{ Auth::user()->name }} <br>
            @if (Auth::user()->isAdm)
                <a href="{{ route('movie.lista') }}">Lista de Filmes</a><br>
                <a href="{{ route('categoria.list') }}">Lista de Categorias</a><br>
            @endif
        </div>
    
<a href="{{ route('logout') }}">Logout</a>
</div>

@else
<a href="{{ route('login') }}">Logue-se Aqui</a>
@endif

    <hr>

    @yield('content')
    

</body>
</html>
