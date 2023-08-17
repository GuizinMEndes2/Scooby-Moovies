<div style="text-align: center; margin-top: 15%">



    <h2>Apagar Categoria</h2>
    <p>Você está apagando a categoria: {{ $categoria->name}}.</p>

    <form action="{{route('categoria.deleteConfirm', $categoria->id)}}" method="post">
        @csrf
        @method('delete')

        <input type="submit" value="Apagar"> <br>
        <a href="{{route('categoria.list')}}">Voltar</a>

    </form>
