@extends('partials.layout')

@section('title','Editar artículo')

@section('content')
    <header>
        <h1>Actualizar Artículo # {{ $article->id }}</h1>

        <div>
            <a href="{{ route('article.show' , $article) }}" class="second-button">Cancelar</a>
            <button class="new-product" type="submit" form="form-create-article">Guardar cambios</button>
        </div>
    </header> 
        
    <form id="form-create-article" class="form-new-product" method="POST" action="{{ route('article.update', $article) }}">
        @csrf {{-- Cross Site Request Forgery --}}
        @method('PATCH')

        <div style="grid-row: span 2;">
            <h2 class="text-heading">Información general</h2>

            <p>Título</p> 
            <input name="tittle" type="text" placeholder="Título del artículo" value="{{ old('titulo', $article['titulo']) }}"> 

            <p>Contenido</p>
            @if($article->contenido == null)
                <textarea name="content" placeholder="Sin contenido"></textarea>
            @else
                <textarea name="content" placeholder="Sin contenido">{{ $article->contenido }}</textarea>
            @endif 
            

            <p>Autor</p> 
            <input name="author" type="text" placeholder="Nombre del autor" value="{{ old('autor', $article['autor']) }}"> 

        </div>

        <div>
            <h2 class="text-heading">Imagen</h2>

            <input name="image" type="file">
        </div>
        
        <div>
            <h2 class="text-heading">Categoria</h2>

            <p>Categoria del artículo</p> 
            <select name="category">
                <option value="{{ $article->categoria->id }}">{{ $article->categoria->nombre }}</option>

                @foreach($categories as $category)

                    @if($article->categoria_id == $category->id) 
                        @continue
                    @endif
            
                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                
                @endforeach
            </select>
        </div>
    </form>
@endsection