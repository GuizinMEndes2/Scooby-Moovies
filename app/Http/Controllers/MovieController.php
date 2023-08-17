<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

    public function add()
    {
        $categoriaSearch = Categoria::all();
        return view('movie.add', compact('categoriaSearch'));
    }

    public function addConfirm(Request $form)
    {
        $dados = $form->validate([
            'name' => 'required|min:3',
            'sinopse' => 'string|required',
            'ano' => 'required',
            'imagem' => 'string|required',
            'link' => 'string|required',
        ]);

        movie::create($dados);
        return redirect()->route('movie.add')->with('sucesso', 'Filme adicionado com sucesso!');
    }

    public function delete(Movie $movie)
    {
        return view('movie.delete', [
            'movie' => $movie,
        ]);
    }
    public function deleteConfirm(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movie.list')->with('sucesso', 'Filme apagada com sucesso!');
    }

    public function edit(Movie $movie)
    {
        $categoriaSearch = Categoria::all();
        return view('movie.add', compact('categoriaSearch'), [
            'movie' => $movie,
        ]);
    }
    public function editSave(Request $form, Movie $movie)
    {
        $dados = $form->validate([
            'name' => [
                'required',
                Rule::unique('movies')->ignore($movie->id)
            ],
        ]);
        $movie->fill($dados)->save();

        return redirect()->route('movie.lista')->with('sucesso', 'Filme alterado com sucesso!');
    }
}
