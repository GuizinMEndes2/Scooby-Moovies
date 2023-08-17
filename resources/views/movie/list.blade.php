@extends('!layout.layout')

@section('title', 'Scooby-Moovies Movie List')

@section('content')

<table border="1px black">
    <tr>
        <th>Id</th>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Ano</th>
        <th>Trailer</th>
        <th colspan="2">Ações</th>
    </tr>

    @foreach ($movies as $movie)
    <tr>
        <td><img src="{{ $movie->imagem }}" alt="{{ $movie->name }}" width="100"></td>
        <td>{{ $movie->id }}</td>
        <td>{{ $movie->name }}</td>
        <td>{{ date('Y', strtotime($movie->ano)) }}</td>
        <td><a href="{{$movie->link}}">Trailer</a></td>
        <td><a href="{{ route('movie.edit', $movie->id) }}">Editar</a></td>
        <td><a href="{{ route('movie.delete', $movie->id) }}">Excluir</a></td>
    </tr>
    @endforeach
</table>

@endsection
