@extends('!layout.layout')

@section('title', 'Scooby-Moovies Movie List')

@section('content')

<table border="1px black">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Ano</th>
        <th colspan="2">Ações</th>
    </tr>

    @foreach ($movies as $movie)
    <tr>
        <td>{{ $movie->id }}</td>
        <td>{{ $movie->name }}</td>
        <td>{{ date('Y', strtotime($movie->ano)) }}</td>
        {{-- <td><a href="{{ route('book.edit', $movie->id) }}" class="action-link">Editar</a></td>
        <td><a href="{{ route('book.delete', $movie->id) }}" class="action-link">Excluir</a></td> --}}
    </tr>
    @endforeach
</table>

@endsection
