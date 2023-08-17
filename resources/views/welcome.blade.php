@extends('!layout.layout')
@section('title', 'Home Page')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
    <div class="movie-container">
        @if ($movie instanceof \Illuminate\Database\Eloquent\Collection && $movie->count() > 0)
            @foreach ($movie as $m)
                <div class="movie-card">
                    <a href="{{ route('movie.page', $m->id) }}">
                        <img class="movie-image" src="{{ $m->imagem }}" alt="{{ $m->name }}">
                    </a>
                    <h3 class="movie-title">{{ $m->name }}</h3>
                </div>
            @endforeach
        @else
            <p>Nenhum filme encontrado</p>
        @endif
    </div>
@endsection

