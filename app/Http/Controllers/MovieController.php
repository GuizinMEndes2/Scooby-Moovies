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


    public function movieList(Request $request)
    {
        if ($request->isMethod('POST')) {
            $busca = $request->busca;

            $movies = Movie::where('name', 'LIKE', "%{$busca}%")
                ->orWhere('id', $busca)
                ->orderBy('id')
                ->get();
        } else {
            $movies = Movie::all();
        }
        $categoriaSearch = Categoria::all();

        return view('movie.list', compact('categoriaSearch'), [
            'movies' => $movies,
        ]);
    }

    public function add(Movie $movie)
    {
        $categoriaSearch = Categoria::all();
        return view('movie.add', compact('categoriaSearch'), [
            'movie' => $movie,
        ]);
    }

    public function addConfirm(Request $form)
    {
        $dados = $form->validate([
            'name' => 'required|min:3',
            'sinopse' => 'string|required',
            'ano' => 'required',
            'imagem' => 'string|required',
            'link' => 'string|required',
            'categorias' => 'array',
        ]);

        $movie = Movie::create($dados);

        if ($form->categorias) {
            $movie->categorias()->attach($form->categorias);
        }

        return redirect()->route('movie.lista')->with('sucesso', 'Filme adicionado com sucesso!');
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

        return redirect()->route('movie.lista')->with('sucesso', 'Filme apagada com sucesso!');
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
            'sinopse' => 'string|required',
            'ano' => 'required',
            'link' => 'string|required',
            'categorias' => 'array'
        ]);

        if (!empty($form->imagem)) {
            $dados['imagem'] = $form->imagem;
        }

        $movie->fill($dados)->save();

        if ($form->categorias) {
            $movie->categorias()->sync($form->categorias);
        } else {
            $movie->categorias()->detach();
        }

        return redirect()->route('movie.lista')->with('sucesso', 'Filme alterado com sucesso!');

    }

}