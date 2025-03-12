@extends('partials.layout')

@section('title','Productos')

@section('content')
    <header>
        <div>
            <button class="button-root select">Productos</button>
            <button class="button-root no-select">Articulos</button>
        </div>

        <a href="{{ route('products.create') }}" class="new-product">Nuevo producto</a>
    </header> 
        
    <div class="categories">
                <div class="category">
                    <div class="category-details">
                        <p class="text-body">Sin categoria <span class="separation"></span> <span class="text-opaque">10 productos</span></p>
                        <p class="text-small">Productos que no tienen categoria</p>
                    </div>
                </div>
                <div class="category">
                    <div class="category-details">
                        
                        <p class="text-body">Electrodomesticos <span class="separation"></span> <span class="text-opaque">14 productos</span></p>
                        <p class="text-small">Lo mejor de</p>
                        
                        <div class="menusito">
                            <p></p>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                </div>
    
                <button class="new-category">+</button>
    </div>

    <input class="search" type="text" placeholder="Buscar producto"/>
    
    <section class="products">
        <table style="width: 100%;">
            <thead>
                <tr class="text-muted">
                    <th><strong>PRODUCTO</strong></th>
                    <th><strong>PRECIO</strong></th>
                    <th><strong>STOCK</strong></th>
                    <th><strong>CATEGORIA</strong></th>
                    <th><strong>FECHA CRE</strong></th>
                    <th><strong>FECHA ACT</strong></th>
                </tr>
            </thead>
    
            <tbody>

                @forelse($products as $product)
                    <tr class="product">
                        <td class="text-body" style="display:flex;gap:0 7px;">
                            <img src="{{ asset(  $product->imagen  ) }}" alt="photo-product">
                            <div>
                                <p class="text-body">{{ $product->nombre }} <br> <span class="text-small"># {{ $product->id }}</span></p>
                            </div>
                        </td>

                        <td class="text-body">{{ $product->precio }}</td>
                        <td class="text-opaque">{{ $product->stock }}</td>
                        <td class="text-opaque">{{ $product->categoria->nombre }}</td>
                        <td class="text-opaque">{{ $product->created_at }}</td>
                        <td class="text-opaque">{{ $product->updated_at }}</td>
                    </tr>
                @empty
                    <li>No hay elementos para mostrar</li>
                @endforelse

            </tbody>
        </table>
    </section>
@endsection