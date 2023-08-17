<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MovieController;
use App\Models\Categoria;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::match(['get', 'post'], '/', function (Request $request) {
    $categorias = Categoria::all();
    $movieQuerry = Movie::query();
    $categoriaSearch = Categoria::all();

    if ($request->isMethod('POST')) {
        $busca = $request->busca;
        $ano = $request->ano;
        $categoria_id = $request->categoria_id;

        $movieQuerry->where('name', 'LIKE', "%{$busca}%");

        if ($ano) {
            $movieQuerry->whereRaw('YEAR(ano) = ?', [$ano]);
        }

        if ($categoria_id) {
            $movieQuerry->whereHas('categorias', function ($query) use ($categoria_id) {
                $query->where('categorias.id', $categoria_id);
            });
        }
    }

    $movie = $movieQuerry->get();

    $movie->load('categorias');

    $filmes = Movie::select('movies.id', 'movies.name', \DB::raw('GROUP_CONCAT(categorias.name SEPARATOR ", ") AS categorias'))
        ->join('m-categorias', 'movies.id', '=', 'm-categorias.movie_id')
        ->join('categorias', 'm-categorias.categoria_id', '=', 'categorias.id')
        ->groupBy('movies.id', 'movies.name')
        ->get();

    $categoriaSelecionado = null;

    if ($movie->count() === 0) {
        return view('welcome', compact('categoriaSelecionado', 'categorias', 'categoriaSearch'))->with('movie', $movie)->with('noResults', true);
    } else {
        return view('welcome', compact('categoriaSelecionado', 'filmes', 'categorias', 'categoriaSearch'))->with('movie', $movie);
    }
})->name('home')->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'regSuccess'])->name('register.addSuccess');

Route::prefix('movie')->group(function () {
    Route::middleware(['auth'])->group(function () {
    Route::get('/view/{movie}', [MovieController::class, 'view'])->name('movie.page');

    Route::get('/list', [MovieController::class, 'movieList'])->name('movie.lista');
    Route::post('/list', [MovieController::class, 'movieList'])->name('movie.listaSearch');

    Route::get('/add', [MovieController::class, 'add'])->name('movie.add');
    Route::post('/add', [MovieController::class, 'addConfirm'])->name('movie.addConfirm');

    Route::get('/delete/{movie}', [MovieController::class, 'delete'])->name('movie.delete');
    Route::delete('/delete/{movie}', [MovieController::class, 'deleteConfirm'])->name('movie.deleteConfirm');

    Route::get('/edit/{movie}', [MovieController::class, 'edit'])->name('movie.edit');
    Route::post('/edit/{movie}', [MovieController::class, 'editSave'])->name('movie.editSave');
});
});

Route::prefix('categoria')->group(function () {
    Route::middleware(['auth'])->group(function () {
    Route::get('/list', [CategoriaController::class, 'categoriaList'])->name('categoria.list');
    Route::post('/list', [CategoriaController::class, 'categoriaList'])->name('categoria.listSearch');

    Route::get('/add', [CategoriaController::class, 'add'])->name('categoria.add');
    Route::post('/add', [CategoriaController::class, 'addConfirm'])->name('categoria.addConfirm');

    Route::get('/delete/{categoria}', [CategoriaController::class, 'delete'])->name('categoria.delete');
    Route::delete('/delete/{categoria}', [CategoriaController::class, 'deleteConfirm'])->name('categoria.deleteConfirm');

    Route::get('/edit/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::post('/edit/{categoria}', [CategoriaController::class, 'editSave'])->name('categoria.editSave');
});
});
