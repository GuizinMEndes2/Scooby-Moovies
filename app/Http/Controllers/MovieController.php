<?php

namespace App\Http\Controllers;

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

        $categorias = $movies->categorias()->pluck('name')->implode(', ');
        return view('movie.view', compact('movies', 'categorias'));
    }
}