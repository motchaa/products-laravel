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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
