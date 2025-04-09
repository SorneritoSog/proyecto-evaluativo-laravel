@extends('partials.layout')

@section('title','Artículos')

@section('content')
    <header>
        <div>
            <a href="{{ route('home') }}" class="button-root no-select">Productos</a>
            <button class="button-root select">Articulos</button>
        </div>

        @auth
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>

            <a href="{{ route('articles.create') }}" class="new-product">Nuevo articulo</a>
        @else 
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <form></form>

            <p></p>
        @endauth
    </header> 
        
    <div class="categories">
        <div class="category" onclick="window.location='{{ route('articles') }}'">
            <div class="category-details">
                <p class="text-body">Todos <span class="separation"></span> <span class="text-opaque">{{ $totalArticles }} Articulos</span></p>
            </div>
        </div>

        <div class="category" onclick="window.location='{{ route('category.show', $categories[0]->id) }}'">
            <div class="category-details">
                <p class="text-body">Sin categoria <span class="separation"></span> <span class="text-opaque">{{ $categories[0]->articulos_count }} Articulos</span></p>
                <p class="text-small">Articulos que no tienen categoria</p>
            </div>
        </div>

        @foreach($categories as $category)

            @if($category->id == 2) 
                @continue
            @endif
            
            <div class="category" onclick="window.location='{{ route('category.show', $category->id) }}'">
                <div class="category-details">
                            
                    <p class="text-body">{{ $category->nombre }}<span class="separation"></span> <span class="text-opaque">{{ $category->articulos_count }} Articulos</span></p>
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

    <section class="articles">
        <table style="width: 100%;">
            <thead>
                <tr class="text-muted">
                    <th><strong>ARTÍCULO</strong></th>
                    <th><strong>AUTOR</strong></th>
                    <th><strong>COMENTARIOS</strong></th>
                    <th><strong>CATEGORIA</strong></th>
                    <th><strong>FECHA CRE</strong></th>
                    <th><strong>FECHA ACT</strong></th>
                </tr>
            </thead>

            <div class="conteiner-tbody">
            <tbody>

                @forelse($articles as $article)
                    <tr class="product" onclick="window.location='{{ route('article.show', $article) }}'">                        
                        <td class="text-body" style="display:flex;gap:0 7px;">
                            <img src="{{ asset(  $article->imagen_destacada  ) }}" alt="photo-product">
                            <div>
                                <p class="text-body">{{ $article->titulo }} <br> <span class="text-small"># {{ $article->id }}</span></p>
                            </div>
                        </td>

                        <td class="text-body">{{ $article->autor }}</td>
                        <td class="text-opaque">{{ $article->comentarios_count }}</td>
                        <td class="text-opaque">{{ $article->categoria->nombre }}</td>
                        <td class="text-opaque">{{ $article->created_at }}</td>
                        <td class="text-opaque">{{ $article->updated_at }}</td>                
                    </tr>
                @empty
                    <tr>
                        <td class="text-muted">Sin artículos</td>
                    </tr>
                @endforelse

            </tbody>
            </div>
            
        </table>
    </section>
    
@endsection