<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(["create", "edit", "destroy"]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'tipo' => $request['category-type'],
            'nombre' => $request['name'],
            'descripcion' => $request['description']
        ]);

        if ($request['category-type'] == "productos") {
            return redirect()->route('home')->with('status', 'Categoria creada exitosamente');
        } else {
            return redirect()->route('articles')->with('status', 'Categoria creada exitosamente');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if($category->tipo == "productos") {
            $products = $category->productos;
            $totalProducts = Product::count();
    
            $categories = Category::with('productos')->withCount('productos')->where('tipo', 'productos')->get();
    
            return view('categories.showP', compact('products', 'categories', 'totalProducts'));
        } else {
            $articles = $category->articulos()->withCount('comentarios')->get();
            $totalArticles = Article::count();

            $categories = Category::with('articulos')->withCount('articulos')->where('tipo', 'articulos')->get();

            return view('categories.showA', compact('articles', 'categories', 'totalArticles'));
        }  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'tipo' => $request->input('category-type'),
            'nombre' => $request->input('name'),
            'descripcion' => $request->input('description')
        ]);

        if ($request['category-type' == "producto"]) {
            return redirect()->route('home')->with('status', 'Categoria actualizada exitosamente');
        } else {
            return redirect()->route('articles')->with('status', 'Categoria actualizada exitosamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $content;

        if ($category->tipo == "productos") {

            $content = $category->productos;

            foreach ($content as $item) {
                $item->update(['categoria_id' => 1]);
            }

            $category->delete();

            return redirect()->route('home')->with('status', 'Categoria eliminada');

        } else {
            $content = $category->articulos;

            foreach ($content as $item) {
                $item->update(['categoria_id' => 2]);
            }

            $category->delete();

            return redirect()->route('articles')->with('status', 'Categoria eliminada');
        }
    }
}
