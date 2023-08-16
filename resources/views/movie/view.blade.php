@extends('!layout.layout')

@section('title', 'Scooby-Moovies')

@section('content')

    <div>
        <div>
            <div>
                @if($movies->imagem)
                    <img src="{{ $movies->imagem }}" alt="{{ $movies->name }}" width="100">
                @else
                    Sem imagem
                @endif
            </div>
            <div>
                <h1>{{ $movies->name }}</h1>
                <a href="{{ $movies->link }}">Assistir ao Trailer</a>
                <fieldset>
                    <legend>Sinopse:</legend>
                    {{ $movies->sinopse }}
                </fieldset>
                <p>Ano de Publicação: {{ date('Y', strtotime($movies->ano)) }}</p>
                <p>Categoria(s):
                    @if ($movies->categorias->count() > 0)
                        {{ $movies->categorias->pluck('name')->implode(', ') }}
                    @else
                        Nenhum gênero associado
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
