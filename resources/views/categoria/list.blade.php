

@section('title', 'Scooby-Moovies Categoria List')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/list.css') }}">
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

<div class="search-container">
    <form class="search-form" action="{{ url()->current() }}" method="POST">
        @csrf
        <input class="search-input" type="text" name="busca" placeholder="Pesquisar...">
        <button class="search-button" type="submit">Buscar</button>
    </form>
</div>

<a href="{{ route('categoria.add') }}" class="logout-button">Adicionar Categoria</a>


<table class="netflix-table">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th colspan="2">Ações</th>
    </tr>

    @foreach ($categorias as $categoria)
    <tr>
        <td>{{ $categoria->id }}</td>
        <td>{{ $categoria->name }}</td>
        <td><a href="{{ route('categoria.edit', $categoria->id) }}">Editar</a></td>
        <td><a href="{{ route('categoria.delete', $categoria->id) }}">Excluir</a></td>
    </tr>
    @endforeach
</table>
<br>
