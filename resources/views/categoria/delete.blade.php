<link rel="stylesheet" href="{{ asset('/css/delete.css') }}">
<link rel="stylesheet" href="{{ asset('/css/layout.css') }}">

@section('title', 'Apagar Categoria')

@section('content')
<div class="delete-category">
    <div class="delete-container">
        <h2>Apagar Categoria</h2>
        <p>Você está apagando a categoria: {{ $categoria->name }}.</p>

        <form action="{{ route('categoria.deleteConfirm', $categoria->id) }}" method="post" class="delete-form">
            @csrf
            @method('delete')

            <button type="submit" class="delete-button">Apagar</button>
        </form>

        <a href="{{ route('categoria.list') }}" class="back-link">Voltar</a>
    </div>
</div>