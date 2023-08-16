@extends('!layout.layout')
@section('title', 'Home Page')

@section('content')

@if ($movie instanceof \Illuminate\Database\Eloquent\Collection && $movie->count() > 0)

@foreach ($movie as $m)
<div>
    <img style="width: 150px; height: 200px; object-fit: cover;" src="{{$m->imagem}}" alt="{{$m->name}}">
    <p>{{$m->name}}</p>
<p>
    @if ($moviecat->cat->count() > 0)
        {{ $moviecat->cat->pluck('name')->implode(', ') }}
    @else
        Nenhuma categoria associado
    @endif
</p>
<hr>
</div>
@endforeach

@endif

@endsection
