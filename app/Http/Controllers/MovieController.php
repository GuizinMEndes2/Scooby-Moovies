<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function view(Movie $movie, Request $request)
    {
        $userId = null;
        if (Auth::check()) {
            $userId = $request->user()->id;
        }

        $movie->load('categorias');

        $categoriaSearch = Categoria::all();

        return view('movie.view', [
            'movie' => $movie,
            'categoriaSearch' => $categoriaSearch,
        ]);
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