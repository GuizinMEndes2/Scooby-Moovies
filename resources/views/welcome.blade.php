@extends('!layout.layout')
@section('title', 'Home Page')

@section('content')

@if (Auth::user())
<div style="display: inline-block;">
{{ Auth::user()->nome }} <br>
<a href="{{ route('logout') }}">Logout</a>
</div>

{{-- @if (Auth::user() && Auth::user()->isAdmin)
<a href="{{ route('book') }}">Gerenciar Livros</a>
@endif --}}

@else
<a href="{{ route('login') }}">Logue-se Aqui</a>
@endif

@endsection
