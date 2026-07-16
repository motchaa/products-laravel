<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public readonly Product $produto;

    public function __construct(Product $produto)
    {
        $this->produto = new Product();
    }

    public function index()
    {
        $produtos = $this->produto->all();
        return view('produtos', ['produtos' => $produtos]);
    }

    public function create()
    {
        $categorias = Category::select('id', 'nome')->orderBy('nome')->get();
        return view('produto_create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $created = $this->produto->create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'codigo' => $request->input('codigo'),
            'valor' => $request->input('valor'),
            'quantidade' => $request->input('quantidade'),
            'categoria_id'=> $request->input('categoria_id'),
        ]);

        if ($created) {
            return redirect()->back()->with('message','Successfully created');
        }

        return redirect()->back()->with('message','Error creating product');
    }

    public function show(Product $produto)
    {
        return view('produto_show', ['produto' => $produto]);
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
