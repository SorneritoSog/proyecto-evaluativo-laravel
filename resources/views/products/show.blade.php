@extends('partials.layout')

@section('title','Producto')

    <section class="product-info">
        <div class="product-general-info">
            <img src="{{ asset(  $product->imagen  ) }}" alt="photo-product">

            <div style="margin: 0 20px 0 10px">
                <h1>{{ $product->nombre }} <br> <span class="text-small"># {{ $product->id }}</span></h1>

                <p class="text-opaque" style="margin-top: 10px;">
                    @if($product->descripcion == null)
                        Sin detalles
                    @else
                        {{ $product->descripcion }}
                    @endif
                </p>
            </div>
            
            <div><a href="{{ route('home') }}">x</a></div>
            
        </div>

        <div class="product-detail">
            <p class="text-opaque">Precio</p>
            <p class="text-body">$ {{ $product->precio }}</p>
        </div>

        <div class="product-detail">
            <p class="text-opaque">Stock</p>
            <p class="text-body">{{ $product->stock }}</p>
        </div>

        <div class="product-detail">
            <p class="text-opaque">Categoria</p>
            <p class="text-body">{{ $product->categoria->nombre }}</p>
        </div>

        <div class="product-detail">
            <p class="text-opaque">Fecha de creación</p>
            <p class="text-body">{{ $product->created_at }}</p>
        </div>

        <div class="product-detail">
            <p class="text-opaque">Última actualización</p>
            <p class="text-body">{{ $product->updated_at }}</p>
        </div>

        <div class="product-buttons">

            <form action="{{ route('product.delete', $product) }}" method="POST">
                @csrf @method('DELETE')

                <button class="delete-button">Eliminar</button>
            </form>
            
            <a class="second-button" href="{{ route('product.edit', $product) }}">Editar</a>
        </div>

    </section>

@section('content')
    
@endsection