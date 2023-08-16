@extends('!layout.layout')
@section('title', 'Home Page')

@section('content')

@if ($movie instanceof \Illuminate\Database\Eloquent\Collection && $movie->count() > 0)

    @foreach ($movie as $m)
        <div>
            <a href="{{ route('movie.page', $m->id) }}">
                <img style="width: 150px; height: 200px; object-fit: cover;" src="{{$m->imagem}}" alt="{{$m->name}}">
            </a>
            <p>{{$m->name}}</p>
            <hr>
        </div>
    @endforeach

@else
    <p>Nenhum filme encontrado</p>
@endif

@endsection
