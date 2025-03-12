@extends('partials.layout')

@section('title','Nuevo producto')

@section('content')
    <header>
        <h1>Nuevo Producto</h1>

        <div>
            <a href="{{ route('home') }}" class="second-button">Cancelar</a>
            <button class="new-product">Añadir producto</button>
        </div>
    </header> 
        
    <form class="form-new-product">
        <div>
            <h2 class="text-heading">Información general</h2>

            <p>Nombre</p> 
            <input type="text" placeholder="Nombre del producto"> 

            <p>Descripción</p> 
            <textarea placeholder="Descripción del producto"></textarea>

        </div>
        <div>
            <h2 class="text-heading">Imagen</h2>

            <input type="file">
        </div>
        <div class="price-and-stock">
            <h2 class="text-heading">Precio y existencias</h2>

            <div>
                <p>Precio</p> 
                <input type="text" placeholder="$ 0"> 
            </div>

            <div>
                <p>Existencas</p> 
                <input type="number" placeholder="0"> 
            </div>
        </div>
        <div>
            <h2 class="text-heading">Categoria</h2>

            <p>Categoria del producto</p> 
            <select>
                <option value="opcion1">Sin categoria</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
                <option value="opcion1">Opción 1</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
            </select>
        </div>
    </form>
@endsection