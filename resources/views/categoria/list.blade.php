@extends('!layout.layout')

@section('title', 'Scooby-Moovies categoria List')

@section('content')

<table border="1px black">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th colspan="2">Ações</th>
    </tr>

    @foreach ($categorias as $categoria)
    <tr>
        <td>{{ $categoria->id }}</td>
        <td>{{ $categoria->name }}</td>
        <td><a href="{{ route('categoria.edit', $categoria->id) }}" class="action-link">Editar</a></td>
        <td><a href="{{ route('categoria.delete', $categoria->id) }}" class="action-link">Excluir</a></td>
    </tr>
    @endforeach
</table>
<br>
<a href="{{ route('categoria.add') }}">Adicionar Categoria</a>
@endsection
