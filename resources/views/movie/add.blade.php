@extends('!layout.layout')

@section('title', 'Scooby-Moovies Movie List')

@section('content')

@if (session('sucesso'))
    <div>{{session('sucesso')}}</div>
@endif

@if ($errors)
@foreach ($errors->all() as $erro)
    {{$erro}} <br>
    @endforeach
@endif

<form action="{{ url()->current()}}" method="POST">
    @csrf
    <h2>Nome do Filme:</h2>
    <input type="text" name="name" placeholder="Nome do Filme" value="{{old('name', $movie->name ?? '')}}"><br>

    <h2>Sinopse do Filme:</h2>
    <textarea name="sinopse" cols="40" rows="5" placeholder="Sinopse do filme">{{old('sinopse', $movie->sinopse ?? '')}}</textarea><br>

    <fieldset style=" margin-right: 90%">
        <legend style="text-align: left">Data de Publicação:</legend>
        <input type="date" name="ano" value="{{old('ano', $movie->ano ?? '')}}"> <br>
    </fieldset>

    @if($movie->imagem)
    <label for="imagem"> <h2>Imagem atual do livro:</h2></label> <br>
    <img src="{{ $movie->imagem }}" alt="Imagem antiga do livro" width="200">
    <br>
    @else
    <p>Livro ainda não possui uma imagem</p>
    @endif
    <div>
        <label for="imagem"><h3>Nova imagem do Livro:</h3></label> <br>
        <input type="text" name="imagem" placeholder="Link da imagem">
    </div> <br>

    <div>
        <label for="link"><h2>Trailer do filme:</h2></label> <br>
        <input type="text" name="link" placeholder="Link do trailer" value="{{old('ano', $movie->link ?? '')}}">
    </div> <br>

    <input type="submit" value="Gravar">
</form>
<br>
    <a href="{{route('movie.lista')}}">Voltar</a>
</div>

@endsection
