@extends('partials.layout')

@section('title','Nuevo producto')

@section('content')
    <header>
        <h1>Actualizar producto # {{ $product->id }}</h1>

        <div>
            <a href="{{ route('product.show', $product) }}" class="second-button">Cancelar</a>
            <button class="new-product" type="submit" form="form-update-product">Guardar</button>
        </div>
    </header> 
        
    <form id="form-update-product" class="form-new-product" method="POST" action="{{ route('product.update', $product) }}">
        @csrf {{-- Cross Site Request Forgery --}}
        @method('PATCH')

        <div>
            <h2 class="text-heading">Información general</h2>

            <p>Nombre</p> 
            <input name="name" type="text" placeholder="Nombre del producto" value="{{ old('nombre', $product['nombre']) }}"> 

            <p>Descripción</p> 
            
            @if($product->descripcion == null)
                <textarea name="description" placeholder="Sin detalles"></textarea>
            @else
                <textarea name="description" placeholder="Detalles del producto">{{ old('descripcion', $product['descripcion']) }}</textarea>     
            @endif

        </div>
        <div>
            <h2 class="text-heading">Imagen</h2>

            <input name="image" type="file">
        </div>
        <div class="price-and-stock">
            <h2 class="text-heading">Precio y existencias</h2>

            <div>
                <p>Precio</p> 
                <input name="price" type="text" placeholder="Precio del producto" value="{{ old('precio', $product['precio']) }}"> 
            </div>

            <div>
                <p>Existencas</p> 
                <input name="stock" type="number" placeholder="0" value="{{ old('stock', $product['stock']) }}"> 
            </div>
        </div>
        <div>
            <h2 class="text-heading">Categoria</h2>

            <p>Categoria del producto</p> 
            <select name="category">
                <option value="{{ $product->categoria_id }}">{{ $product->categoria->nombre }}</option>

                @foreach($categories as $category)

                    @if($product->categoria_id == $category->id) 
                        @continue
                    @endif
            
                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                
                @endforeach
            </select>
        </div>
    </form>
@endsection