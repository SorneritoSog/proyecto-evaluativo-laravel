<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->withCount('comentarios')->get();
        $totalArticles = Article::count();

        $categories = Category::with('articulos')->withCount('articulos')->where('tipo', 'articulos')->get();

        return view('articles.index', compact('articles', 'totalArticles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->where('tipo', 'articulos')->get();

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create([
            'titulo' => $request['tittle'],
            'contenido' => $request['content'],
            'imagen_destacada' => "css/porshe.jpg",
            'autor' => $request['author'],
            'categoria_id' => $request['category']
        ]);

        return redirect()->route('articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $comments = Comment::latest()->where('articulo_id', $article->id)->get();

        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::latest()->where('tipo', 'articulos')->get();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'titulo' => $request['tittle'],
            'contenido' => $request['content'],
            'imagen_destacada' => "css/porshe.jpg",
            'autor' => $request['author'],
            'categoria_id' => $request['category']
        ]);

        return redirect()->route('article.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles');
    }
}
