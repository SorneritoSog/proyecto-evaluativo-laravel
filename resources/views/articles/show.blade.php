@extends('partials.layout')

@section('title','Artículo')

    <section class="conteiner-article-info">
        <div class="article-all-info">
            <div class="product-general-info">
                <img src="{{ asset(  $article->imagen_destacada  ) }}" alt="photo-product">

                <div style="margin: 0 20px 0 10px">
                    <h1>{{ $article->titulo }} <br> <span class="text-small"># {{ $article->id }}</span></h1>
                </div>

                <div><a href="{{ route('articles') }}">x</a></div>
            </div>

            <div class="product-detail">
                <p class="text-opaque">Autor</p>
                <p class="text-body">{{ $article->autor }}</p>
            </div>

            <div class="product-detail">
                <p class="text-opaque">Contenido</p>
                <p class="text-body">{{ $article->contenido }}</p>
            </div>

            @if(session('status'))
                <div class="product-detail">
                    <p class="text-body">{{ session('status') }}</p>
                    <p></p>
                </div>
            @endif

            @auth
                <div class="product-buttons">

                    <form action="{{ route('article.delete', $article) }}" method="POST">
                        @csrf 
                        @method('DELETE')

                        <button class="delete-button">Eliminar</button>
                    </form>

                    <a href="{{ route('article.edit', $article) }}" class="second-button">Editar</a>
                </div>
            @endauth

        </div>

        <div class="content-comments">
            <div class="comments-header">
                <h2 class="text-heading">Comentarios <span class="text-muted">{{ count($comments) }}</span></h2>

                @auth
                    <a href="{{ route('comment.create', $article) }}" class="new-product">Agregar comentario</a>
                @else 
                    <p></p>
                @endauth
            </div>

            <div class="comments">

                @forelse($comments as $comment)
                    <div class="comment">
                        <div>
                            <p class="text-opaque"># {{ $comment->id }}</p>
                            @auth 
                                <a href="{{ route('comment.edit', ['article' => $article, 'comment' => $comment]) }}" class="button-edit-comment"><img src="{{ asset( 'css/editar.png' ) }}" alt="edit"></a>
                            @else
                                <p></p>
                            @endauth
                        </div>

                        <p class="text-body">{{ $comment->contenido }}</p>

                        <p class="text-muted"> 
                            Publicado por <br> 
                            <span class="text-opaque">{{ $comment->nombre_usuario }}</span> <br> 
                            <span class="text-small">{{ $comment->email }}</span>
                        </p>

                        <div>
                            <p class="text-muted">Creado el <br> <span class="text-opaque">{{ $comment->created_at }}</span></p>
                            <p class="text-muted">Actualizado el <br> <span class="text-opaque">{{ $comment->updated_at }}</span></p>
                        </div>

                        @auth 
                            <form action="{{ route('comment.delete', ['article' => $article, 'comment' => $comment]) }}" method="POST" style="display:flex;justify-content: flex-end;">
                                @csrf @method('DELETE')

                                <button class="delete-button">Eliminar</button>
                            </form>
                        @endauth
                    </div>
                @empty
                    <p class="text-muted">Sin comentarios</p>
                @endforelse

            </div>
            
        </div>
    </section>

@section('content')
    
@endsection