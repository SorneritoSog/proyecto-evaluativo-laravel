<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
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
    public function create(Article $article)
    {
        $comments = Comment::latest()->where('articulo_id', $article->id)->get();

        return view('comments.create', compact('article', 'comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Article $article)
    {
        Comment::create ([
            'contenido' => $request['content'],
            'nombre_usuario' => $request['user'],
            'email' => $request['email'],
            'articulo_id' => $article->id
        ]);

        $comments = Comment::latest()->where('articulo_id', $article->id)->get();

        return redirect()->route('article.show', compact('article', 'comments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, Comment $comment)
    {
        $comments = Comment::latest()->where('articulo_id', $article->id)->get();

        return view('comments.edit', compact('comment', 'article', 'comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, Comment $comment)
    {
        $comment->update([
            'contenido' => $request['content'],
            'nombre_usuario' => $request['user'],
            'email' => $request['email']
        ]);

        $comments = Comment::latest()->where('articulo_id', $article->id)->get();

        return redirect()->route('article.show', compact('article', 'comments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, Comment $comment)
    {
        $comment->delete();

        $comments = Comment::latest()->where('articulo_id', $article->id)->get();

        return redirect()->route('article.show', compact('article', 'comments'));
    }
}
