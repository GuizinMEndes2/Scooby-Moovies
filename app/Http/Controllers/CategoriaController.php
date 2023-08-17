<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function categoriaList()
    {
        $categorias = Categoria::all();
        $categoriaSearch = Categoria::all();

        return view('categoria.list', compact('categoriaSearch'), [
            'categorias' => $categorias,
        ]);
    }

    public function add()
    {
        $categoriaSearch = Categoria::all();
        return view('categoria.add', compact('categoriaSearch'));
    }

    public function addConfirm(Request $form)
    {
        $dados = $form->validate([
            'name' => 'required|min:3',
        ]);

        Categoria::create($dados);
        return redirect()->route('categoria.add')->with('sucesso', 'Categoria adicionado com sucesso!');
    }

    public function delete(Categoria $categoria)
    {
        return view('categoria.delete', [
            'categoria' => $categoria,
        ]);
    }
    public function deleteConfirm(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categoria.list')->with('sucesso', 'Categoria apagada com sucesso!');
    }

    public function edit(Categoria $categoria)
    {
        $categoriaSearch = Categoria::all();
        return view('categoria.add', compact('categoriaSearch'), [
            'categoria' => $categoria,
        ]);
    }
    public function editSave(Request $form, Categoria $categoria)
    {
        $dados = $form->validate([
            'name' => [
                'required',
                Rule::unique('categorias')->ignore($categoria->id)
            ],
        ]);
        $categoria->fill($dados)->save();

        return redirect()->route('categoria.list')->with('sucesso', 'Gênero alterado com sucesso!');
    }
}