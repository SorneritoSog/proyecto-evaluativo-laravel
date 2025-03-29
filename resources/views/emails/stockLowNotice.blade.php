@extends('partials.layout')

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
            
        </div>

        <div class="product-detail">
            <p class="text-opaque">Precio</p>
            <p class="text-body">$ {{ $product->precio }}</p>
        </div>

        <div class="product-detail">
            <p class="text-opaque">Stock</p>
            <p class="text-body" style="color: #B42F3A;">{{ $product->stock }}</p>
        </div>

        <div class="product-detail">
            <p class="text-opaque">Categoria</p>
            <p class="text-body">{{ $product->categoria->nombre }}</p>
        </div>

    </section>

@section('content')
    
@endsection