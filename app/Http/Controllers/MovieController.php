<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function view(Movie $movies, Request $request)
    {
        $userId = null;
        if (Auth::check()) {
            $userId = $request->user()->id;
        }
        $categoriaSearch = Categoria::all();

        $categorias = $movies->categorias()->pluck('name')->implode(', ');
        return view('movie.view', compact('movies', 'categorias', 'categoriaSearch'));
    }

    public function movieList()
    {
        $movies = Movie::all();
        $categoriaSearch = Categoria::all();

        return view('movie.list', compact('categoriaSearch'), [
            'movies' => $movies,
        ]);
    }


}