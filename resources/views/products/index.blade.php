@extends('partials.layout')

@section('title','Productos')

@section('content')
    <header>
        <div>
            <button class="button-root select">Productos</button>
            <a href="{{ route('articles') }}" class="button-root no-select">Articulos</a>
        </div>

        @auth
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>

            <a href="{{ route('products.create') }}" class="new-product">Nuevo producto</a>
        @else 
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <form></form>

            <p></p>
        @endauth

    </header> 
        
    <div class="categories">
        <div class="category" onclick="window.location='{{ route('home') }}'">
            <div class="category-details">
                <p class="text-body">Todos <span class="separation"></span> <span class="text-opaque">{{ $totalProducts }} Productos</span></p>
            </div>
        </div>

        <div class="category" onclick="window.location='{{ route('category.show', $categories[0]->id) }}'">
            <div class="category-details">
                <p class="text-body">Sin categoria <span class="separation"></span> <span class="text-opaque">{{ $categories[0]->productos_count }} Productos</span></p>
                <p class="text-small">Productos que no tienen categoria</p>
            </div>
        </div>

        @foreach($categories as $category)

            @if($category->id == 1) 
                @continue
            @endif
            
            <div class="category" onclick="window.location='{{ route('category.show', $category->id) }}'">
                <div class="category-details">
                            
                    <p class="text-body">{{ $category->nombre }}<span class="separation"></span> <span class="text-opaque">{{ $category->productos_count }} Productos</span></p>
                    <p class="text-small">

                    @if($category->descripcion == null) 
                        Sin descripción
                    @else
                        {{ $category->descripcion }}
                    @endif
                        

                    </p>

                    <a class="button-edit-category" href="{{ route('category.edit', $category) }}">
                        <img src="{{ asset( 'css/editar.png' ) }}" alt="edit">
                    </a>
                </div>
            </div>
                
        @endforeach

        @auth
            @if(count($categories) < 9) 
                <button class="new-category" onclick="window.location='{{ route('categories.create') }}'">+</button>
            @endif
        @endauth
        
    </div>

    <div class="search-and-message">
        <input class="search" type="text" placeholder="Buscar producto"/>

        @if(session('status'))
            <p class="text-body">{{ session('status') }}</p>
        @endif
    </div>
    
    
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

            <div class="conteiner-tbody">
            <tbody>

                @forelse($products as $product)
                    <tr class="product" onclick="window.location='{{ route('product.show', $product) }}'">                        
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
                    <tr>
                        <td class="text-muted">Sin productos</td>
                    </tr>
                @endforelse

            </tbody>
            </div>
            
        </table>
    </section>
@endsection