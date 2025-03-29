@extends('partials.layout')

@section('title','Producto')

@section('content')

    <div class="comment">
        <div>
            <p class="text-opaque"># {{ $comment->id }}</p>
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

    </div>
    
@endsection