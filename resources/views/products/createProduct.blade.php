@extends('partials.layout')

@section('title','Nuevo producto')

@section('content')
    <header>
        <h1>Nuevo Producto</h1>

        <div>
            <a href="{{ route('home') }}" class="second-button">Cancelar</a>
            <button class="new-product" type="submit" form="form-create-product">Añadir producto</button>
        </div>
    </header> 
        
    <form id="form-create-product" class="form-new-product" method="POST" action="{{ route('products.store') }}">
        @csrf {{-- Cross Site Request Forgery --}}

        <div>
            <h2 class="text-heading">Información general</h2>

            <p>Nombre</p> 
            <input name="name" type="text" placeholder="Nombre del producto"> 

            <p>Descripción</p> 
            <textarea name="descriptions" placeholder="Descripción del producto"></textarea>

        </div>
        <div>
            <h2 class="text-heading">Imagen</h2>

            <input name="image" type="file">
        </div>
        <div class="price-and-stock">
            <h2 class="text-heading">Precio y existencias</h2>

            <div>
                <p>Precio</p> 
                <input name="price" type="text" placeholder="$ 0"> 
            </div>

            <div>
                <p>Existencas</p> 
                <input name="stock" type="number" placeholder="0"> 
            </div>
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