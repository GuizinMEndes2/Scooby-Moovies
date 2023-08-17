@extends('!layout.layout')

@section('title', 'Scooby-Moovies categoria List')

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
    <input type="text" name="name" placeholder="Categoria" value="{{old('name', $categoria->name ?? '')}}"><br>
    <br>
    <input type="submit" value="Gravar">
</form>
<br>
    <a href="{{route('categoria.list')}}">Voltar</a>
</div>

@endsection
