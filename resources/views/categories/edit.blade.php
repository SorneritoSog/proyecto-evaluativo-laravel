@extends('partials.layout')

@section('title','Editar categoria')

    <form class="product-info" method="POST" action="{{ route('category.update', $category) }}">
        @csrf {{-- Cross Site Request Forgery --}}
        @method('PATCH')

        <h1 style="margin: 0 0px 20px 0px">Actualizar categoria {{ $category->id }}</h1>

        <div class="new-category-field">
            <p class="text-body">Tipo de categoria</p>
            
            <select name="category-type">
                @if($category->tipo == "productos") 
                    <option value="productos">Productos</option>
                    <option value="productos">Articulos</option>
                @else
                    <option value="productos">Articulos</option>
                    <option value="productos">Productos</option>
                @endif
            </select>
        </div>
        
        <div class="new-category-field">
            <p class="text-body">Nombre</p>
            <input name="name" type="text" placeholder="Nombre del producto" value="{{ old('nombre', $category['nombre']) }}">
        </div>

        <div class="new-category-field">
            <p class="text-body">descripcion</p>
            @if($category->descripcion == null) 
                <textarea name="description" placeholder="Sin descripción"></textarea>
            @else
                <textarea name="description" placeholder="Descripción de la categoria">{{ $category->descripcion }}</textarea>
            @endif
        </div>

        <div class="category-buttons">
            <form action="{{ route('category.delete', $category) }}" method="POST">
                @csrf @method('DELETE')

                <button class="delete-button">Eliminar</button>
            </form>
            
            <div>
                <a class="second-button" href="{{ route('home') }}">Cancelar</a>
                <button class="new-product" href="">Guardar cambios</button>
            </div>
        </div>
    </form>

@section('content')
    
@endsection