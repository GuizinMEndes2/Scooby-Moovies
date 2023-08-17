@extends('!layout.layout')

@section('title', 'Scooby-Moovies')

@section('content')

    <div>
        <div>

            <div>
                <h1>{{ $movie->name }}</h1>
                <div>
                    @if($movie->imagem)
                        <img src="{{ $movie->imagem }}" alt="{{ $movie->name }}" width="100">
                    @else
                        Sem imagem
                    @endif
                </div>
                <a href="{{ $movie->link }}">Assistir ao Trailer</a>
                <fieldset>
                    <legend>Sinopse:</legend>
                    {{ $movie->sinopse }}
                </fieldset>
                <p>Ano de Publicação: {{ date('Y', strtotime($movie->ano)) }}</p>
                <p>Categoria(s):
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
