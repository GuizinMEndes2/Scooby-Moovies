@extends('!layout.layoutAdmin')

@section('title', 'Scooby-Moovies Movie List')

@section('content')

<table border="1px black">
    <tr>
        <th>Imagem</th>
        <th>Id</th>
        <th>Nome</th>
        <th>Ano</th>
        <th>Trailer</th>
        <th colspan="2">Ações</th>
    </tr>

    @foreach ($movies as $movie)
    <tr >
        <td><img style="width: 150px; height: 200px; object-fit: cover; display: block; margin-left: auto;  margin-right: auto;" src="{{ $movie->imagem }}" alt="{{ $movie->name }}"></td>
        <td style="  padding: 15px;">{{ $movie->id }}</td>
        <td style="  padding: 15px;">{{ $movie->name }}</td>
        <td style="  padding: 15px;">{{ date('Y', strtotime($movie->ano)) }}</td>
        <td><a href="{{$movie->link}}" style="  padding: 15px;">Trailer</a></td>
        <td><a href="{{ route('movie.edit', $movie->id) }}" style="  padding: 15px;">Editar</a></td>
        <td><a href="{{ route('movie.delete', $movie->id) }}" style="  padding: 15px;">Excluir</a></td>
    </tr>
    @endforeach
</table>

@endsection
