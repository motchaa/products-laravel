<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public readonly Category $categoria;

    public function __construct(Category $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index()
    {
        $categorias = $this->categoria->all();
        return view('categorias', ['categorias' => $categorias]);
    }
    public function create()
    {
        return view('categoria_create');
    }

    public function store(Request $request)
    {
        $created = $this->categoria->create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao')
        ]);

        if ($created) {
            return redirect()->back()->with('message','Successfully created');
        }

        return redirect()->back()->with('message','Error creating category');
    }

    public function edit(Category $categoria)
    {
        return view('categoria_edit', ['categoria' => $categoria]);
    }

    public function update(Request $request, string $id)
    {
        $updated = $this->categoria->where('id', $id)->update([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao')
        ]);

        if ($updated) {
            return redirect()->back()->with('message','Successfully updated');
        }

        return redirect()->back()->with('message','Error updating category');
    }

    public function destroy(string $id)
    {
        //
    }
}
