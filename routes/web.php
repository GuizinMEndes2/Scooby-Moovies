<?php

use App\Models\Categoria;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get', 'post'], '/', function (Movie $moviecat, Request $request) {
    $categorias = Categoria::all();
    $movieQuerry = Movie::query();

    $movie = $movieQuerry->get();

    // Carregar os gêneros para cada livro encontrado
    $movie->load('categorias');

    $filmes = Movie::select('movies.id', 'movies.name', \DB::raw('GROUP_CONCAT(categorias.name SEPARATOR ", ") AS categorias'))
        ->join('m-categorias', 'movies.id', '=', 'm-categorias.movie_id')
        ->join('categorias', 'm-categorias.categoria_id', '=', 'categorias.id')
        ->groupBy('movies.id', 'movies.name')
        ->get();

    // Definir $generoSelecionado como null
    $categoriaSelecionado = null;

    $cat = $moviecat->categorias()->pluck('name')->implode(', ');
    return view('welcome', compact('cat', 'moviecat', 'categoriaSelecionado', 'filmes', 'categorias'))->with('movie', $movie);
})->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'regSuccess'])->name('register.addSuccess');