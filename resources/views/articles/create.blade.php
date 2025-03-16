@extends('partials.layout')

@section('title','Nuevo artículo')

@section('content')
    <header>
        <h1>Nuevo Artículo</h1>

        <div>
            <a href="{{ route('articles') }}" class="second-button">Cancelar</a>
            <button class="new-product" type="submit" form="form-create-article">Añadir artículo</button>
        </div>
    </header> 
        
    <form id="form-create-article" class="form-new-product" method="POST" action="{{ route('articles.store') }}">
        @csrf {{-- Cross Site Request Forgery --}}

        <div style="grid-row: span 2;">
            <h2 class="text-heading">Información general</h2>

            <p>Título</p> 
            <input name="tittle" type="text" placeholder="Título del artículo"> 

            <p>Contenido</p> 
            <textarea name="content" placeholder="Contenido del artículo"></textarea>

            <p>Autor</p> 
            <input name="author" type="text" placeholder="Nombre del autor"> 

        </div>

        <div>
            <h2 class="text-heading">Imagen</h2>

            <input name="image" type="file">
        </div>
        
        <div>
            <h2 class="text-heading">Categoria</h2>

            <p>Categoria del producto</p> 
            <select name="category">
                @foreach($categories as $category)
            
                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                
                @endforeach
            </select>
        </div>
    </form>
@endsection