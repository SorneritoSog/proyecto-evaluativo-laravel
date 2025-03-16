@extends('partials.layout')

@section('title','Actualizar comentario')

    <section class="conteiner-article-info" style="opacity:0.35;">
        <div class="article-all-info">
            <div class="product-general-info">
                <img src="{{ asset(  $article->imagen_destacada  ) }}" alt="photo-product">

                <div style="margin: 0 20px 0 10px">
                    <h1>{{ $article->titulo }} <br> <span class="text-small"># {{ $article->id }}</span></h1>
                </div>

                <div><a>x</a></div>
            </div>

            <div class="product-detail">
                <p class="text-opaque">Autor</p>
                <p class="text-body">{{ $article->autor }}</p>
            </div>

            <div class="product-detail">
                <p class="text-opaque">Contenido</p>
                <p class="text-body">{{ $article->contenido }}</p>
            </div>

            <div class="product-buttons">

                <form>
                    <button class="delete-button">Eliminar</button>
                </form>
                
                <a class="second-button">Editar</a>
            </div>
        </div>

        <div class="content-comments">
            <div class="comments-header">
                <h2 class="text-heading">Comentarios <span class="text-muted">{{ count($comments) }}</span></h2>

                <a class="new-product">Agregar comentario</a>
            </div>

            <div class="comments">
                @forelse($comments as $item)
                    <div class="comment">
                        <div>
                            <p class="text-opaque"># {{ $item->id }}</p>
                            <a href="" class="button-edit-comment"><img src="{{ asset( 'css/editar.png' ) }}" alt="edit"></a>
                        </div>

                        <p class="text-body">{{ $item->contenido }}</p>

                        <p class="text-muted"> 
                            Publicado por <br> 
                            <span class="text-opaque">{{ $item->nombre_usuario }}</span> <br> 
                            <span class="text-small">{{ $item->email }}</span>
                        </p>

                        <div>
                            <p class="text-muted">Creado el <br> <span class="text-opaque">{{ $item->created_at }}</span></p>
                            <p class="text-muted">Actualizado el <br> <span class="text-opaque">{{ $item->updated_at }}</span></p>
                        </div>

                        <form style="display:flex;justify-content: flex-end;">
                            <button class="delete-button">Eliminar</button>
                        </form>

                    </div>
                @empty
                    <p class="text-muted">Sin comentarios</p>
                @endforelse

            </div>
            
        </div>
    </section>

    <form class="product-info" action="{{ route('comment.update', ['article' => $article, 'comment' => $comment]) }}" method="POST">
        @csrf {{-- Cross Site Request Forgery --}}
        @method('PATCH')
        
        <h2 class="text-heading" style="margin-bottom: 20px;">Actualizar comentario # {{ $comment->id }}</h2>

        <div class="new-category-field">
            <p class="text-body">Nombre completo</p>
            <input name="user" type="text" placeholder="Tu nombre" value="{{ old('nombre_usuario', $comment['nombre_usuario']) }}">
        </div> 

        <div class="new-category-field">
            <p class="text-body">Correo</p>
            <input name="email" type="text" placeholder="Correo personal" value="{{ old('email', $comment['email']) }}">
        </div> 

        <div class="new-category-field">
            <p class="text-body">Contenido</p>
            <textarea name="content" placeholder="Comentario">{{ old('contenido', $comment['contenido']) }}</textarea>
        </div>

        <div class="product-buttons">
            <a class="second-button" href="{{ route('article.show', $article) }}">Cancelar</a>
            <button class="new-product">Guardar cambios</button>
        </div>
        
    </form>

@section('content')
    
@endsection