@extends('partials.layout')

@section('title','Nueva Categoria')

    <form class="product-info" method="POST" action="{{ route('categories.store') }}">
        @csrf {{-- Cross Site Request Forgery --}}

        <h1 style="margin: 0 0px 20px 0px">Nueva categoria</h1>

        <div class="new-category-field">
            <p class="text-body">Tipo de categoria</p>
            <select name="category-type">
                <option value="productos">Productos</option>
                <option value="articulos">Articulos</option>
            </select>
        </div>
        
        <div class="new-category-field">
            <p class="text-body">Nombre</p>
            <input name="name" type="text" placeholder="Nombre del producto">
        </div>

        <div class="new-category-field">
            <p class="text-body">descripcion</p>
            <textarea name="description" placeholder="Descripción de la categoria"></textarea>
        </div>

        <div class="product-buttons">
            <a class="second-button" href="{{ url()->previous() }}">Cancelar</a>
            <button class="new-product" href="">Añadir categoria</button>
        </div>
    </form>

@section('content')
    
@endsection