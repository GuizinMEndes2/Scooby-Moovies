<div style="text-align: center; margin-top: 15%">



    <h2>Apagar Filme</h2>
    <p>Você está apagando o filme: {{ $movie->name}}.</p>

    <form action="{{route('movie.deleteConfirm', $movie->id)}}" method="post">
        @csrf
        @method('delete')

        <input type="submit" value="Apagar"> <br>
        <a href="{{route('movie.lista')}}">Voltar</a>

    </form>
