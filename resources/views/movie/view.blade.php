@extends('!layout.layout')

@section('title', 'Scooby-Moovies')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/view.css') }}">
<div class="movie-details">
    <div class="movie-container">
        <div class="movie-info">
            <h1>{{ $movie->name }}</h1>
            <div class="movie-image">
                @if($movie->imagem)
                    <img src="{{ $movie->imagem }}" alt="{{ $movie->name }}" class="movie-poster">
                @else
                    <div class="no-image">Sem imagem</div>
                @endif
            </div>
            <a href="{{ $movie->link }}" class="watch-trailer">Assistir ao Trailer</a>
            <div class="synopsis-card">
                <h2>Sinopse</h2>
                <p>{{ $movie->sinopse }}</p>
            </div>

            <p class="release-year">

                @if (date('Y', strtotime($movie->ano)) > date('Y'))
                    Filme irá lançar em: {{ date('Y', strtotime($movie->ano)) }}
                @else
                    Ano de Publicação: {{ date('Y', strtotime($movie->ano)) }}
                @endif
            </p>


            <p class="categories">
                @if ($movie->categorias->count() > 0)
                    {{ $movie->categorias->pluck('name')->implode(', ') }}
                @else
                    Nenhum gênero associado
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
