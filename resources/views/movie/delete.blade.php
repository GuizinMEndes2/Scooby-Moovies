<link rel="stylesheet" href="{{ asset('/css/delete.css') }}">
<link rel="stylesheet" href="{{ asset('/css/layout.css') }}">

@section('title', 'Apagar Filme')

@section('content')
<div class="delete-movie">
    <div class="delete-container">
        <h2>Apagar Filme</h2>
        <p>Você está apagando o filme: {{ $movie->name }}.</p>

        <form action="{{ route('movie.deleteConfirm', $movie->id) }}" method="post" class="delete-form">
            @csrf
            @method('delete')

            <button type="submit" class="delete-button">Apagar</button>
        </form>

        <a href="{{ route('movie.lista') }}" class="back-link">Voltar</a>
    </div>
</div>