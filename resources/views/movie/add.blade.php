

@section('title', 'Scooby-Moovies Movie List')

@section('content')

@if (session('sucesso'))
    <div class="success-message">{{session('sucesso')}}</div>
@endif

@if ($errors)
@foreach ($errors->all() as $erro)
    <div class="error-message">{{$erro}}</div>
    @endforeach
@endif

<link rel="stylesheet" href="{{ asset('/css/form.css') }}">
<link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('/css/add.css') }}">

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
<div class="form-container">
<form action="{{ url()->current() }}" method="POST" class="netflix-form">
    @csrf
    <h2 class="form-heading">Detalhes do Filme</h2>
    <div class="form-group">
        <label for="name">Nome do Filme</label>
        <input type="text" name="name" placeholder="Nome do Filme" value="{{ old('name', $movie->name ?? '') }}">
    </div>

    <div class="form-group">
        <label for="sinopse">Sinopse do Filme</label>
        <textarea name="sinopse" cols="40" rows="5" placeholder="Sinopse do filme">{{ old('sinopse', $movie->sinopse ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="ano">Data de Publicação</label>
        <input type="date" name="ano" value="{{ old('ano', $movie->ano ?? '') }}">
    </div>

    <div class="form-group">
        @if($movie->imagem)
            <label class="image-label">Imagem atual do filme</label>
            <img src="{{ $movie->imagem }}" alt="Imagem atual do filme" class="current-image">
        @else
            <p>O filme ainda não possui uma imagem</p>
        @endif
    </div>

    <div class="form-group">
        <label for="imagem">Nova imagem do filme</label>
        <input type="text" name="imagem" placeholder="Link da imagem">
    </div>

    <div class="form-group">
        <label for="link">Trailer do filme</label>
        <input type="text" name="link" placeholder="Link do trailer" value="{{ old('link', $movie->link ?? '') }}">
    </div>

    <div class="form-group">
        <label for="categorias">Categorias</label> <br>
        <select name="categorias[]" multiple>
            @foreach ($categoriaSearch as $categoria)
                <option value="{{ $categoria->id }}"
                    @if ($movie->categorias->contains('id', $categoria->id))
                        selected
                    @endif
                >
                    {{ $categoria->name }}
                </option>
            @endforeach
        </select>
    </div>


    <input type="submit" value="Gravar" class="netflix-button">
</form>
