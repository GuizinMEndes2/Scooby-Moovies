@extends('!layout.layout')
@section('title', 'Home Page')

@section('content')

    @if ($movie instanceof \Illuminate\Database\Eloquent\Collection && $movie->count() > 0)

        @foreach ($movie as $m)
            <div style="float: left; padding: 20px;margin-left: 5%;">

                <a href="{{ route('movie.page', $m->id) }}">
                    <img style="width: 150px; height: 200px; object-fit: cover; display: block; margin-left: auto;  margin-right: auto;"
                        src="{{ $m->imagem }}" alt="{{ $m->name }}">
                </a>
                <h3>{{ $m->name }}</h3>
            </div>
        @endforeach
    @else
        <p>Nenhum filme encontrado</p>
    @endif

@endsection
