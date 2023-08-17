

@section('title', 'Scooby-Moovies Categoria List')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/form.css') }}">
<link rel="stylesheet" href="{{ asset('/css/layout.css') }}">

<div class="navbar">
    <a href="{{ route('home') }}" class="navbar-logo">
        <h1>Scooby-Mooves</h1>
    </a>

    <div class="user-info">
        {{ Auth::user()->name }}
    </div>

    <div class="admin-links">
        <a href="{{ route('movie.lista') }}">Lista de Filmes</a>
        <a href="{{ route('categoria.list') }}">Lista de Categorias</a>
    </div>

    <a href="{{ route('logout') }}" class="logout-button">Logout</a>
</div>

@if (session('sucesso'))
    <div class="success-message">{{ session('sucesso') }}</div>
@endif

@if ($errors->any())
    <div class="error-messages">
        @foreach ($errors->all() as $erro)
            {{ $erro }} <br>
        @endforeach
    </div>
@endif

<div class="netflix-form-card">
    <h2 class="netflix-form-title">Adicionar Nova Categoria</h2>
    <form action="{{ url()->current() }}" method="POST" class="netflix-form">
        @csrf
        <input type="text" name="name" placeholder="Categoria" value="{{ old('name', $categoria->name ?? '') }}"><br>
        <button type="submit" class="netflix-button">Gravar</button>
    </form>
</div>

<br>
<a href="{{ route('categoria.list') }}" class="netflix-link">Voltar</a>

