<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\StockLowNotice;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class ProductoController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->only(["create", "edit", "destroy"]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        $totalProducts = Product::count();

        $categories = Category::with('productos')->withCount('productos')->where('tipo', 'productos')->get();

        return view('products.index', compact('products', 'categories', 'totalProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->where('tipo', 'productos')->get();

        return view('products.createProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = Product::create([
            'nombre' => $request['name'],
            'descripcion' => $request['description'],
            'precio' => $request['price'],
            'stock' => $request['stock'],
            'imagen' => "css/porshe.jpg",
            'categoria_id' => $request['category']
        ]);
    
        if ($product->stock <= 5) {
            Mail::to('spenalozavelez1@gmail.com')->send(new StockLowNotice($product));
        }

        return redirect()->route('home')->with('status', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::latest()->where('tipo', 'productos')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'nombre' => $request->input('name'),
            'descripcion' => $request->input('description'),
            'precio' => $request->input('price'),
            'stock' => $request->input('stock'),
            'imagen' => 'css/porshe.jpg',
            'categoria_id' => $request->input('category'),
        ]);

        if ($product->stock <= 5) {
            Mail::to('spenalozavelez1@gmail.com')->send(new StockLowNotice($product));
        }

        return redirect()->route('product.show', $product)->with('status', 'Producto actualzado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('home')->with('status', 'Producto eliminado');
    }
}